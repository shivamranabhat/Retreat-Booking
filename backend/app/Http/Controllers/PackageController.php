<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Accommodation;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected function getDropdownData()
    {
        return [
            'instructors' => Instructor::all(),
            'accommodations' => Accommodation::all(),
            'locations' => Location::all(),
            'categories' => Category::all(),
        ];
    }

    // Display a listing of the packages
    public function index(Request $request)
    {
        $packages = Package::filter($request->all())->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    // Show the form for creating a new package
    public function create()
    {
        $dropdownData = $this->getDropdownData();
        return view('admin.packages.create', compact('dropdownData'));
    }

    // Store a newly created package in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'images.*' => 'nullable|file|mimes:jpg,jpeg,png,gif',
            'summary' => 'nullable|string|max:1000',
            'features' => 'nullable|string|max:1000',
            'description' => 'nullable|string|max:1000',
            'highlights' => 'nullable|string|max:1000',
            'itinerary' => 'nullable|string|max:1000',
            'category' => 'nullable|string|max:100',
            'terms_and_conditions' => 'nullable|string|max:1000',
            'days' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'included' => 'nullable|string|max:1000',
            'not_included' => 'nullable|string|max:1000',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'instructors_id' => 'nullable|integer|exists:instructors,id',
            'accommodations_id' => 'nullable|integer|exists:accommodations,id',
            'locations_id' => 'nullable|integer|exists:locations,id',
            'categories_id' => 'nullable|integer|exists:categories,id',
        ]);

        // Process multiple image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('storage/packages/', 'public'); // Specify path for package images
                $imagePaths[] = $path;
            }
        }

        $validatedData['images'] = json_encode($imagePaths);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['status'] = 0;
        Package::create($validatedData);
        dd($validatedData);
        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }

    // Display the specified package
    public function show(string $slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        return view('admin.packages.show', compact('package'));
    }

    // Show the form for editing the specified package
    public function edit(string $slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        $dropdownData = $this->getDropdownData();
        return view('admin.packages.edit', compact('package', 'dropdownData'));
    }

    // Update the specified package in storage
    public function update(Request $request, string $slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'images.*' => 'nullable|file|mimes:jpg,jpeg,png,gif',
            'summary' => 'nullable|string|max:1000',
            'features' => 'nullable|string|max:1000',
            'description' => 'nullable|string|max:1000',
            'highlights' => 'nullable|string|max:1000',
            'itinerary' => 'nullable|string|max:1000',
            'category' => 'nullable|string|max:100',
            'terms_and_conditions' => 'nullable|string|max:1000',
            'days' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'included' => 'nullable|string|max:1000',
            'not_included' => 'nullable|string|max:1000',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'instructor_id' => 'nullable|integer|exists:instructors,id',
            'accommodation_id' => 'nullable|integer|exists:accommodations,id',
            'location_id' => 'nullable|integer|exists:locations,id',
            'categories_id' => 'nullable|integer|exists:categories,id',
        ]);

        // Process new images
        $imagePaths = json_decode($package->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($imagePaths as $oldImagePath) {
                $oldImageFullPath = public_path($oldImagePath);
                if (file_exists($oldImageFullPath)) {
                    unlink($oldImageFullPath);
                }
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('storage/packages/', 'public');
                $newImagePaths[] = $path;
            }
        }

        $validatedData['images'] = json_encode($newImagePaths ?? $imagePaths);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $package->update($validatedData);
        return redirect()->route('packages')->with('success', 'Package updated successfully!');
    }

    public function updateStatus(string $slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        $package['status'] = 1;
        $package->update($package);

        return redirect()->route('packages')->with('success', 'Package status updated successfully!');
    }
    // Remove the specified package from storage
    public function destroy(string $slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();

        if ($package->images) {
            $imagePaths = json_decode($package->images, true);
            foreach ($imagePaths as $imagePath) {
                $imageFullPath = public_path('storage/' . $imagePath);
                if (file_exists($imageFullPath)) {
                    unlink($imageFullPath);
                }
            }
        }

        $package->delete();
        return redirect()->route('packages')->with('success', 'Package deleted successfully.');
    }
}
