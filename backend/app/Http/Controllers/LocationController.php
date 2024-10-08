<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminte\Validation\Rule;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::filter(request(['search']))->latest()->select('name','slug','created_at')->paginate(10);
        return view('admin.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name'=>'required|unique:locations,name',
            'image'=>'required|image|mimes:jpeg,png,jpg,webp',
            'image_alt'=>'required'
        ],['name.unique'=>'This location is already exists']);
         // Handle main image upload
         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $formFields['image'] = $image->storeAs('location', $imageName, 'public');
        }
        $slug = Str::slug($formFields['name']);
        Location::create($formFields+['slug'=>$slug]);
        return redirect()->route('locations')->with('message','Location added successfully');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $location = Location::whereSlug($slug)->first();
        return view('admin.location.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $slug)
    {
        $location = Location::whereSlug($slug)->first();
        $formFields = $request->validate([
            'name'=>'required|unique:locations,name,'.$location->id,
            'image'=>'nullable|image|mimes:jpeg,png,jpg,webp',
            'image_alt'=>'required'
        ],['name.unique'=>'This location is already exists']);
         // Handle main image upload
         if ($request->hasFile('image')) {
            if (!empty($location->image)) {
                $oldImagePath = public_path('storage/' . $location->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $uploadedFile = $request->file('image');
            $fileName = time() . '-' . $uploadedFile->getClientOriginalName();
            $mainImagePath = $uploadedFile->storeAs('location', $fileName, 'public');
            $formFields['image'] = $mainImagePath;
        }
        $slug = Str::slug($formFields['name']);
        $location->update($formFields+['slug'=>$slug]);
        return redirect()->route('locations')->with('message','Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $location = Location::whereSlug($slug)->first();
        if(!empty($location->image))
        {
            $image_path = public_path('storage/'.$location->image);
            if(file_exists($image_path))
            {
                unlink($image_path);
            }
        }
        $location->delete();
        return redirect()->route('locations')->with('message','Location deleted successfully');
    }
}
