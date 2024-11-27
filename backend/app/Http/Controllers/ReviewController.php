<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Display a list of reviews
    public function index()
    {
        $reviews = Review::with(['user', 'package'])->paginate(10); // Paginate for a better list view
        return view('admin.reviews.index', compact('reviews'));
    }

    // Show a single review
    public function show(string $slug)
    {
        $review = Review::with(['user', 'package'])->findOrFail($slug);
        return view('admin.reviews.show', compact('review'));
    }

    public function destroy(string $slug)
    {
        $review = Review::findOrFail($slug);
        $review->delete();

        return redirect()->route('reviews')->with('success', 'Review deleted successfully.');
    }
}
