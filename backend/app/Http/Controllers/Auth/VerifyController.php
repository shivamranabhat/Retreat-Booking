<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\VerifyToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Models\Script;
use App\Models\TwitterCard;
use App\Models\OpenGraph;
use App\Models\Page;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    private function getSeo()
    {
        $slug = request()->segment(1);
        $page = Page::whereSlug($slug)->first();
        $page_id = $page->id;
        $meta_tags = Tag::where('page_id',$page_id)->orWhere('slug','all')->first();
        //script for header
        $scriptHeader = Script::where(function ($query) {
            $query->where('position', 'header')
                ->where('page_id', 1);
        })->orWhere(function ($query) use ($page_id) {
            $query->where('position', 'header')
                ->whereHas('page', function ($query) use ($page_id) {
                    $query->where('page_id', $page_id);
                });
        })->orderBy('created_at', 'asc')->get();
        //open graph 
        $openGraph = OpenGraph::where(function ($query) {
            $query->where('page_id', 1);
        })->orWhere(function ($query) use ($page_id) {
            $query->whereHas('page', function ($query) use ($page_id) {
                    $query->where('page_id', $page_id);
                });
        })->orderBy('created_at', 'asc')->get();

        //twitter card 
        $twitterCard = TwitterCard::where(function ($query) {
            $query->where('page_id', 1);
        })->orWhere(function ($query) use ($page_id) {
            $query->whereHas('page', function ($query) use ($page_id) {
                    $query->where('page_id', $page_id);
                });
        })->orderBy('created_at', 'asc')->get();

        //script for footer
        $scriptFooter = Script::where(function ($query) {
            $query->where('position', 'footer')
                ->where('page_id', 1);
        })->orWhere(function ($query) use ($page_id) {
            $query->where('position', 'footer')
                ->whereHas('page', function ($query) use ($page_id) {
                    $query->where('page_id', $page_id);
                });
        })->orderBy('created_at', 'asc')->get();
        return compact('scriptHeader','scriptFooter','openGraph','twitterCard','meta_tags');
    }
    public function index()
    {
        return view('pages.auth.verify',$this->getSeo());
    }
    public function verifyOtp(Request $request)
    {
        $request = request()->segment(2); 
        $email = str_replace('email=', '', $request);
        $userExists = User::where('email',$email)->first();
        $userVerified = User::where('email',$email)->where('is_verified',1)->first();
        if(!$userExists || $userVerified)
        {
            return abort(404);
        }
       return view("pages.auth.verify",compact('email'));
    }
}
