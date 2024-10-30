<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
<<<<<<< HEAD
        return view('admin.categories.index', compact('categories'));
=======
        return view('admin.category.index', compact('categories'));
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
    }

    public function create()
    {
<<<<<<< HEAD
        return view('admin.categories.create');
=======
        return view('admin.category.create');
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($request->all());
        return redirect()->route('categories')->with('success', 'Category created successfully.');
    }

<<<<<<< HEAD
    public function show(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        return view('categories.show', compact('category'));
    }

    public function edit(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $name)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $name,
        ]);

        $category = Category::where('name', $name)->firstOrFail();
=======
   
    public function edit(string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->name,
        ]);
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
        $category->update($request->all());
        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

<<<<<<< HEAD
    public function destroy(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();
=======
    public function destroy(string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();
>>>>>>> e309fa3c7707d0235c4051d2cf80e7baae6d459d
        $category->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }
}
