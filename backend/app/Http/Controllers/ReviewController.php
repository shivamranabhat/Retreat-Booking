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
        return view('reviews.index', compact('reviews'));
    }

    // Show a single review
    public function show($id)
    {
        $review = Review::with(['user', 'package'])->findOrFail($id);
        return view('reviews.show', compact('review'));
    }
}
