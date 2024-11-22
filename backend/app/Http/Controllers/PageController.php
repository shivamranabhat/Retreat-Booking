<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Package;
use App\Models\ExtraPage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function profile()
    {
        return view('pages.profile');
    }
    public function addedPage($slug)
    {
        // try{
            $page = Extrapage::whereSlug($slug)->select('name','description')->first();
            return view('pages.added-page',compact('slug','page'));
        //  }
        //  catch (\Exception $e) {
        //      return abort(404);
        //  }
    }
    public function retreat($retreat)
    {
        $category = Category::whereSlug($retreat)->select('name')->first();
        return view('pages.retreat',compact('category','retreat'));
    }
    public function retreatDetails($retreat,$slug)
    {
        $package = Package::whereSlug($slug)->select('title','category_id')->first();
        return view('pages.retreat-details',compact('retreat','slug','package'));
    }
    public function inquiry($slug)
    {
        $package = Package::whereSlug($slug)->select('title','category_id')->first();
        return view('pages.inquiry',compact('slug','package'));
    }
    public function writeReview($slug)
    {
        if(auth()->user() && auth()->user()->is_verified===1)
        {
            $package = Package::whereSlug($slug)->select('title','category_id')->first();
            return view('pages.review',compact('slug','package'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function login()
    {
        try{
            if(auth()->user() && auth()->user()->is_verified===1)
            {
                return redirect()->back();
            }
            return view('pages.auth.login');
         }
         catch (\Exception $e) {
             return abort(404);
         }
    }
    public function register()
    {
        try{
            if(auth()->user())
            {
                return redirect()->back();
            }
            else{
                return view('pages.auth.register');
            }
        }
        catch (\Exception $e) {
            return abort(404);
        }
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
