<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(Request $request)
    {
        $instructors = Instructor::filter($request->all())->get();
        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string',
            'experience' => 'required|integer',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        Instructor::create($data);
        return redirect()->route('instructors.index')->with('success', 'Instructor added successfully.');
    }

    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructors'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string',
            'experience' => 'required|integer',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $instructor->update($data);
        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully.');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully.');
    }
}
