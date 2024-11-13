<?php

namespace App\Http\Controllers;

use App\Models\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Validation\Rule;

class WhyUsController extends Controller
{
    public function index()
    {
        $details = WhyUs::filter(request(['search']))->select('title','created_at','slug')->latest()->paginate(10);
        return view('admin.about.whyus.index', compact('details'));
    }

    public function create()
    {
        return view('admin.about.whyus.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required|string|unique:why_us,title',
            'description' => 'required|string',
        ]);
        $slug = Str::slug($request['title']);
        WhyUs::create($formFields + ['slug' => $slug]);

        return redirect()->route('whyUs')->with('success', 'Data added successfully.');
    }

   
    public function edit(string $slug)
    {
        $details = WhyUs::whereSlug($slug)->firstOrFail();
        return view('admin.about.whyus.edit', compact('details'));
    }

    public function update(Request $request, string $slug)
    {
        $details = WhyUs::whereSlug($slug)->firstOrFail();
        $formFields = $request->validate([
            'title' => 'required|string|unique:why_us,title,' . $details->id,
            'description'=>'required',
        ]);
        $slug = Str::slug($formFields['title']);
        $details->update($formFields+['slug'=>$slug]);
        return redirect()->route('whyUs')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $slug)
    {
        $details = WhyUs::whereSlug($slug)->firstOrFail();
        $details->delete();
        return redirect()->route('whyUs')->with('success', 'Data deleted successfully.');
    }
}
