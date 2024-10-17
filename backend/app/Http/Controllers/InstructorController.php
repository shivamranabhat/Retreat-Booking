<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class InstructorController extends Controller
{
    /**
     * Display a listing of the instructors.
     */
    public function index()
    {
        $instructors = Instructor::latest()->filter(request(['search']))->paginate(10);
        return view('admin.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new instructor.
     */
    public function create()
    {
        return view('admin.instructors.create');
    }

    /**
     * Store a newly created instructor in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        try {
            // Handle image upload
            $imagePath = $this->handleImageUpload($request);

            // Create instructor
            Instructor::create([
                'name' => $request->name,
                'image' => $imagePath,
                'experience' => $request->experience,
                'description' => $request->description,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]);

            return redirect()->route('instructors')->with('success', 'Instructor created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified instructor.
     */
    public function show(int $id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified instructor.
     */
    public function edit(int $id)
    {
        $instructor = Instructor::findOrFail($id);
        return view('admin.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified instructor in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        $this->validateRequest($request);

        try {
            // Handle image upload if a new image is provided
            $imagePath = $this->handleImageUpload($request, $instructor->image);

            // Update instructor data
            $instructor->update([
                'name' => $request->name,
                'image' => $imagePath,
                'experience' => $request->experience,
                'description' => $request->description,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]);

            return redirect()->route('instructors')->with('success', 'Instructor updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified instructor from storage.
     */
    public function destroy(int $id)
    {
        $instructor = Instructor::findOrFail($id);
        try {
            if ($instructor->image) {
                Storage::delete('public/' . $instructor->image);
            }
            $instructor->delete();

            return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Validate the incoming request.
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Set maximum size
            'experience' => 'required|integer',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);
    }

    /**
     * Handle image upload and return the path.
     */
    protected function handleImageUpload(Request $request, $existingImage = null)
    {
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($existingImage) {
                Storage::delete('public/' . $existingImage);
            }
            // Store the new image and return its path
            return $request->file('image')->store('instructors', 'public');
        }

        return $existingImage; // Return the existing image path if no new image is uploaded
    }
}
