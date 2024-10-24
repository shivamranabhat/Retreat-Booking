<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input

        $accommodations = Accommodation::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('contact', 'like', "%{$search}%");
        })->paginate(10); // Use paginate instead of get

        return view('admin.accommodations.index', compact('accommodations', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accommodations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate multiple images
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);
        $data = $request->all();
        // Handle multiple images upload
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('accommodations', 'public'); // Store images in public storage
            }
            $data['image'] = json_encode($imagePaths); // Convert array of paths to JSON
        }
        $slug = Str::slug($request['name']);
        Accommodation::create($data + ['slug' => $slug]);

        return redirect()->route('accommodations')->with('success', 'Accommodation created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $accommodation = Accommodation::where('slug', $slug)->firstOrFail();
        return view('admin.accommodations.show', compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $accommodation = Accommodation::where('slug', $slug)->firstOrFail();
        return view('admin.accommodations.edit', compact('accommodation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);

        $accommodation = Accommodation::where('slug', $slug)->firstOrFail();

        // Check for new images
        if ($request->hasFile('images')) {
            // Delete old images
            if (!empty($accommodation->image)) {
                $oldImagePaths = json_decode($accommodation->image, true);
                foreach ($oldImagePaths as $oldImagePath) {
                    $oldImageFullPath = public_path('storage/' . $oldImagePath);
                    if (file_exists($oldImageFullPath)) {
                        unlink($oldImageFullPath);
                    }
                }
            }

            // Handle new images upload
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('accommodations', 'public'); // Store images in public storage
            }
            $data['image'] = json_encode($imagePaths); // Convert array of paths to JSON

        }
        // Update the accommodation with new data
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $data['image'] = $data['image'] ?? $accommodation->image;
        $accommodation->update($data);

        return redirect()->route('accommodations')->with('success', 'Accommodation updated successfully!');
    }


    public function destroy(string $slug)
    {
        try {
            // Retrieve the accommodation record by slug
            $accommodation = Accommodation::where('slug', $slug)->firstOrFail();

            // Check if the accommodation has images stored
            if (!empty($accommodation->images)) {
                // Decode the JSON string to get an array of image paths
                $imagePaths = json_decode($accommodation->images, true);

                // Loop through each image path and delete the image file from storage
                foreach ($imagePaths as $imagePath) {
                    $imageFullPath = public_path('storage/' . $imagePath);
                    if (file_exists($imageFullPath)) {
                        unlink($imageFullPath); // Delete the image file
                    }
                }
            }

            // Delete the accommodation record from the database
            $accommodation->delete();

            // Redirect with a success message
            return redirect()->route('accommodations')->with('success', 'Accommodation and its images deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions and redirect with an error message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
