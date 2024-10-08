<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::latest()->select('image','slug','created_at')->paginate(10);
        return view('admin.about.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $formFields = $request->validate([
                'link'=>'nullable',
                'image'=>'required|image|mimes:jpg,png,jpeg'
            ]);
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('partners',$imageName,'public');
            }
            $slug = Str::slug(Str::random(8));
            partner::create($formFields+['slug'=>$slug]);
            return redirect()->route('partners')->with('message','Partner added successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function edit(String $slug)
    {
        $partner = Partner::whereSlug($slug)->first();
        return view('admin.about.partner.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $slug)
    {
        try{
            $partner = Partner::whereSlug($slug)->first();
            $formFields = $request->validate([
                'link'=>'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg',
            ]);
            if($request->hasFile('image'))
            {
                if(!empty($partner->image))
                {
                    $image_path = public_path('storage/'.$partner->image);
                    if(file_exists($image_path))
                    {
                        unlink($image_path);
                    }
                }
                $uploadedFile = $request->file('image');
                $fileName = $uploadedFile->getClientOriginalName();
                $formFields['image'] = $uploadedFile->storeAs('partners',$fileName,'public');
                $partner->update($formFields);
            }
            $partner->update($formFields);
            return redirect()->route('partners')->with('message','Partner updated successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try{
            $partner = Partner::whereSlug($slug)->first();
            if(!empty($partner->image))
            {
                $image_path = public_path('storage/'.$partner->image);
                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }
            $partner->delete();
            return redirect()->route('partners')->with('message','Partner deleted successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
