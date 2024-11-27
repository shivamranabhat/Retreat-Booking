<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomTypes = RoomType::filter(request(['search']))
            ->latest()
            ->select('id', 'image', 'name', 'description', 'percentage', 'slug', 'created_at')
            ->paginate(10);
        return view('admin.room_types.index', compact('roomTypes'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $formFields = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'percentage' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $formFields['image'] = $image->storeAs('rooms', $imageName, 'public');
            }

            $slug = Str::slug($formFields['name']);
            RoomType::create($formFields + ['slug' => $slug]);

            return redirect()->route('roomTypes')->with('message', 'Room type added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Please fill the required fields.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $slug)
    {
        $roomType = RoomType::whereSlug($slug)->first();
        return view('admin.room_types.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $slug)
    {
        $roomType = RoomType::whereSlug($slug)->firstOrFail();

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'percentage' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (!empty($roomType->image)) {
                $oldImagePath = public_path('storage/' . $roomType->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $formFields['image'] = $image->storeAs('rooms', $imageName, 'public');
        }

        $formFields['slug'] = Str::slug($formFields['name']);
        $roomType->update($formFields);
        return redirect()->route('roomTypes')->with('message', 'Room type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $slug)
    {
        try {
            $roomType = RoomType::whereSlug($slug)->firstOrFail();

            if (!empty($roomType->image)) {
                $imagePath = public_path('storage/' . $roomType->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $roomType->delete();
            return redirect()->route('roomTypes')->with('message', 'Room type deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

