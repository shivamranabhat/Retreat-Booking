<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::filter(request(['search']))
            ->latest()
            ->select('id', 'image', 'name', 'address', 'phone_number', 'slug', 'created_at') // Add 'address' and 'phone_number'
            ->paginate(10);
        return view('admin.instructors.index', compact('instructors'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $formFields = $request->validate([
                'name' => 'required',
                'phone_number' => 'required',
                'experience' => 'required',
                'description' => 'required',
                'address' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'image_alt' => 'required'
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('instructors', $imageName, 'public');
            }

            // Generate slug from name
            $slug = Str::slug($formFields['name']);
            // Create instructor with the form fields and slug
            Instructor::create($formFields + ['slug' => $slug]);

            return redirect()->route('instructors')->with('message', 'Instructor added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please fill the required fields.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $instructor = Instructor::whereSlug($slug)->first();
        return view('admin.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $slug)
    {
        $instructor = Instructor::whereSlug($slug)->firstOrFail();

        // Validate the request
        $formFields = $request->validate([
            'name' => 'required|unique:instructors,name,' . $instructor->id,
            'phone_number' => 'required',
            'experience' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'name.unique' => 'Instructor with this name already exists'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if (!empty($instructor->image)) {
                $oldImagePath = public_path('storage/' . $instructor->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $formFields['image'] = $image->storeAs('instructors', $imageName, 'public');
        }

        // Update slug
        $formFields['slug'] = Str::slug($formFields['name']);

        // Update the instructor
        $instructor->update($formFields);

        return redirect()->route('instructors')->with('message', 'Instructor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try {
            $instructor = Instructor::whereSlug($slug)->firstOrFail();

            if (!empty($instructor->image)) {
                $imagePath = public_path('storage/' . $instructor->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $instructor->delete();

            return redirect()->route('instructors')->with('message', 'Instructor deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
