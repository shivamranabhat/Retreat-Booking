<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function blogs()
    {
        return view('pages.blogs');
    }
    public function blog($slug)
    {
        $blog = Blog::whereSlug($slug)->first();
        return view('pages.blog',compact('slug','blog'));
    }
}
