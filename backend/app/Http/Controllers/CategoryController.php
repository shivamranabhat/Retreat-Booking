<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($request->all());
        return redirect()->route('categories')->with('success', 'Category created successfully.');
    }

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
        $category->update($request->all());
        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $category->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully.');
    }
}
