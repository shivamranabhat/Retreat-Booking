<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Accommodation;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\Location;
use App\Models\Inclusion;
use App\Models\Exclusion;
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
        $packages = Package::filter($request->all())->latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function uploadPackageImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $uploadedFile = $request->file('upload');
            // Generate a unique file name
            $fileName = $uploadedFile->getClientOriginalName();
            // Move the file to the desired directory
            $uploadedFile->move(public_path('storage/packages'), $fileName);
            // Construct the URL to the uploaded file
            $url = asset('storage/packages/' . $fileName);
            // Return JSON response
            return response()->json(['file' => $fileName, 'uploaded' => 1, 'url' => $url]);
        } else {
            // Handle case when no file is uploaded
            return response()->json(['uploaded' => 0, 'error' => 'No file uploaded']);
        }
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
            'images' => ['required', 'array', function ($attribute, $value, $fail) {
                if (count($value) < 4) {
                    $fail('Please upload atleast 4 images for galleries');
                }
            }],
            'summary' => 'nullable|string',
            'features' => 'nullable|string',
            'highlights' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'terms_and_conditions' => 'nullable|string',
            'days' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'instructor_id' => 'required|integer|exists:instructors,id',
            'accommodation_id' => 'required|integer|exists:accommodations,id',
            'location_id' => 'required|integer|exists:locations,id',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $validatedData['main_image'] = $image->storeAs('packages/main_images', $imageName, 'public');
        }

        // Process multiple image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('packages/', 'public');
                $imagePaths[] = $path;
            }
        }

        $validatedData['images'] = json_encode($imagePaths);
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $package = Package::create($validatedData);
        if ($request->has('inclusions')) {
            foreach ($request->input('inclusions') as $inclusion) {
                $inclusions = [
                    'inclusion' => $inclusion['title'],
                    'package_id' => $package->id,
                ];
    
                Inclusion::create($inclusions);
            }
        }
        if ($request->has('exclusions')) {
            foreach ($request->input('exclusions') as $exclusion) {
                $exclusions = [
                    'exclusion' => $exclusion['title'],
                    'package_id' => $package->id,
                ];
    
                Exclusion::create($exclusions);
            }
        }
        return redirect()->route('packages')->with('success', 'Package created successfully!');
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
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'images' => ['nullable', 'array', function ($attribute, $value, $fail) {
                if (count($value) < 4) {
                    $fail('Please upload atleast 4 images for gallery');
                }
            }],
            'summary' => 'nullable|string',
            'features' => 'nullable|string',
            'highlights' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'terms_and_conditions' => 'nullable|string',
            'days' => 'nullable|integer',
            'price' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'instructor_id' => 'nullable|integer|exists:instructors,id',
            'accommodation_id' => 'nullable|integer|exists:accommodations,id',
            'location_id' => 'nullable|integer|exists:locations,id',
            'category_id' => 'nullable|integer|exists:categories,id',
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
        if ($request->hasFile('main_image')) {
            if (!empty($package->main_image)) {
                $oldImagePath = public_path('storage/' . $package->main_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $uploadedFile = $request->file('main_image');
            $fileName = time() . '-' . $uploadedFile->getClientOriginalName();
            $mainImagePath = $uploadedFile->storeAs('packages/main_images', $fileName, 'public');
            $validatedData['main_image'] = $mainImagePath;
        }

        $package->update($validatedData);
        if ($request->has('inclusions')) {
            foreach ($request->input('inclusions') as $inclusion) {
                $inclusionData = [
                    'inclusion' => $inclusion['title'],
                    'package_id'=>$package->id,
                ];
                Inclusion::updateOrCreate(
                    ['id' => $inclusion['id'] ?? null], 
                    $inclusionData
                );
            }
        }
        if ($request->has('exclusions')) {
            foreach ($request->input('exclusions') as $exclusion) {
                $exclusionData = [
                    'exclusion' => $exclusion['title'],
                    'package_id'=>$package->id,
                ];
                Exclusion::updateOrCreate(
                    ['id' => $exclusion['id'] ?? null], 
                    $exclusionData
                );
            }
        }
        return redirect()->route('packages')->with('success', 'Package updated successfully!');
    }


    public function updateStatus(string $slug)
    {
        // Retrieve the package by slug or fail
        $package = Package::where('slug', $slug)->firstOrFail();
        // Toggle the status
        $package->status = $package->status === 1 ? 0 : 1;

        // Save the changes to the database
        if ($package->save()) {
            return redirect()->route('packages')->with('success', 'Package status updated successfully!');
        } else {
            return redirect()->route('packages')->with('error', 'Failed to update status for package ' . $slug);
        }
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
        $inclusions = Inclusion::where('package_id',$package->id)->get();
        $exclusions = Exclusion::where('package_id',$package->id)->get();
        if($inclusions)
        {

            foreach ($inclusions as $inclusion) {
                $inclusion->delete();
            }
        }
        if($exclusions)
        {

            foreach ($exclusions as $exclusion) {
                $exclusion->delete();
            }
        }
        $package->delete();
        return redirect()->route('packages')->with('success', 'Package deleted successfully.');
    }
}
