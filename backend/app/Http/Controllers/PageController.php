<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function retreat($retreat)
    {
        $category = Category::whereSlug($retreat)->select('name')->first();
        return view('pages.retreat',compact('retreat','category'));
    }
    public function retreatDetails($retreat,$slug)
    {
        $package = Package::whereSlug($slug)->select('title','category_id')->first();
        return view('pages.retreat-details',compact('retreat','slug','package'));
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
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
