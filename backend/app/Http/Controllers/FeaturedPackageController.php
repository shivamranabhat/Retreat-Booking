<?php

namespace App\Http\Controllers;

use App\Models\FeaturedPackage;
use App\Models\Package;
use Illuminate\Http\Request;

class FeaturedPackageController extends Controller
{
    protected function getDropdownData()
    {
        return [
            'packages' => Package::all()
        ];
    }

    public function index()
    {
        $featuredPackages = FeaturedPackage::all();
        return view('admin.featured_packages.index', compact('featuredPackages'));
    }

    public function create()
    {
        $data = $this->getDropdownData();
        return view('admin.featured_packages.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        // Retrieve the package and generate the slug
        $package = Package::find($request->package_id);
        $slug = strtolower(str_replace(' ', '-', $package->title));

        // Check if the slug already exists in the featured_packages table
        $existingSlug = FeaturedPackage::where('slug', $slug)->first();

        // If the slug already exists, return a message and redirect
        if ($existingSlug) {
            return redirect()->route('feature.create')->with('error', 'This Featured Package already exists.');
        }

        // Create the featured package with the unique slug
        FeaturedPackage::create([
            'package_id' => $request->package_id,
            'slug' => $slug,
        ]);

        return redirect()->route('features')->with('success', 'Featured package created successfully.');
    }


    public function show(string $slug)
    {
        $featuredPackage = FeaturedPackage::where('slug', $slug)->firstOrFail();
        return view('admin.featured_packages.show', compact('featuredPackage'));
    }

    public function edit(string $slug)
    {
        $data = $this->getDropdownData();
        $data['featuredPackage'] = FeaturedPackage::where('slug', $slug)->firstOrFail();
        return view('admin.featured_packages.edit', $data);
    }

    public function update(Request $request, string $slug)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        // Retrieve the package and generate the new slug
        $package = Package::find($request->package_id);
        $newSlug = strtolower(str_replace(' ', '-', $package->title));

        // Check if the new slug already exists in the featured_packages table, but exclude the current record
        $existingSlug = FeaturedPackage::where('slug', $newSlug)
            ->where('slug', '!=', $slug) // Exclude the current featured package from the check
            ->first();

        // If the slug already exists, return an error message
        if ($existingSlug) {
            return redirect()->route('featured_package.edit', $slug)->with('error', 'This Featured Package already exists.');
        }

        // Retrieve the featured package by its slug and update it
        $featuredPackage = FeaturedPackage::where('slug', $slug)->firstOrFail();
        $featuredPackage->update([
            'package_id' => $request->package_id,
            'slug' => $newSlug,
        ]);

        return redirect()->route('features')->with('success', 'Featured package updated successfully.');
    }


    public function destroy(string $slug)
    {
        $featuredPackage = FeaturedPackage::where('slug', $slug)->firstOrFail();
        $featuredPackage->delete();
        return redirect()->route('features')->with('success', 'Featured package deleted successfully.');
    }
}
