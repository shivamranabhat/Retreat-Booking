<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\RoomType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    protected function getDropdownData()
    {
        return [
            'room_types' => RoomType::all()
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search input

        $accommodations = Accommodation::filter(request(['search']))->paginate(10); // Use paginate instead of get

        return view('admin.accommodations.index', compact('accommodations', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dropdownData = $this->getDropdownData();
        return view('admin.accommodations.create', compact('dropdownData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
            'room_types' => 'nullable|array',
            'room_types.*' => 'exists:room_types,id'
        ]);

        // Initialize accommodation instance
        $accommodation = new Accommodation();
        $accommodation->name = $request->name;
        $accommodation->description = $request->description;
        $accommodation->location = $request->location;
        $accommodation->contact = $request->contact;

        // Store room types as JSON
        if ($request->has('room_types')) {
            $accommodation->room_types = json_encode($request->room_types);
        }

        // Store images if available
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('accommodations', 'public');
            }
            $accommodation->image = json_encode($imagePaths); // Save images as JSON
        }

        $accommodation->slug = Str::slug($accommodation->name);
        $accommodation->save();
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

        // Decode JSON fields
        $accommodation->image = json_decode($accommodation->image, true);
        $accommodation->room_types = json_decode($accommodation->room_types, true) ?? []; // Decoded as array for easy access

        // Get all room types for selection
        $roomTypes = RoomType::all();

        return view('admin.accommodations.edit', compact('accommodation', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
            'room_types' => 'nullable|array',
            'room_types.*' => 'exists:roomtypes,id'
        ]);

        $accommodation = Accommodation::where('slug', $slug)->firstOrFail();

        $accommodation->name = $request->name;
        $accommodation->description = $request->description;
        $accommodation->location = $request->location;
        $accommodation->contact = $request->contact;

        // Update room types as JSON
        if ($request->has('room_types')) {
            $accommodation->room_types = json_encode($request->room_types);
        }

        // Update images if new ones are uploaded
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

            // Store new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('accommodations', 'public');
            }
            $accommodation->image = json_encode($imagePaths);
        }

        $accommodation->slug = Str::slug($accommodation->name);
        $accommodation->save();

        return redirect()->route('accommodations')->with('success', 'Accommodation updated successfully!');
    }



    public function destroy(string $slug)
    {
        try {
            // Retrieve the accommodation record by slug
            $accommodation = Accommodation::where('slug', $slug)->firstOrFail();

            // Check if the accommodation has images stored
            if (!empty($accommodation->image)) {
                // Decode the JSON string to get an array of image paths
                $imagePaths = json_decode($accommodation->image, true);

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
            return redirect()->route('accommodations')->with('success', 'Accommodation deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions and redirect with an error message
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
