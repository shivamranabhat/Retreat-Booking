<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VerifyToken;
use App\Models\User;
use App\Mail\VerifyUser;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Models\Script;
use App\Models\TwitterCard;
use App\Models\OpenGraph;
use App\Models\Page;
use Illuminate\Support\Facades\Redirect;


class ResetPasswordController extends Controller
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
        return view('pages.auth.forgot');
    }
    public function getResetOtp($email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'There is no account with this email address.');
        }
        return view('pages.auth.forgot-token-verify', compact('email'));
    }
    // public function sendResetOtp(Request $request)
    // {
    //     try{

    //         $request->validate([
    //             'email' => 'required|email',
    //         ]);

    //         $user = User::where('email', $request->email)->first();

    //         if (!$user) {
    //             return back()->with('error', 'There is no account with this email address.');
    //         }

    //         $token = $this->generateToken();
    //         $existingToken = VerifyToken::where('email',$request->email)->first();
    //         if($existingToken)
    //         {
    //             $existingToken->delete();
    //         }
    //         VerifyToken::create([
    //             'token' => $token,
    //             'email' => $request->email,
    //             'is_verified' => false,
    //         ]);

    //         Mail::to($request->email)->send(new VerifyUser($token));
    //         return Redirect::to('/dashboard/send-reset-otp/email=' . $request->email)->with(['token' => $token, 'email' => $request->email]);
    //     }
    //     catch (\Exception $e) {
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }
    
    // public function verifyToken(Request $request, $email)
    // {
    //     try{
    //         $request->validate([
    //             'token' => 'required',
    //         ]);

    //         $verifyToken = VerifyToken::where('email', $email)
    //             ->where('token', $request->token)
    //             ->where('is_verified', false) 
    //             ->first();

    //         if (!$verifyToken) {
    //             return back()->with('error', 'Invalid token. Please try again.');
    //         }

    //         // Mark the token as verified
    //         $verifyToken->is_verified = true;
    //         $verifyToken->save();

    //         return redirect()->route('reset.password', [
    //             'email' => $request->email,
    //             'otp' => $request->token,
    //         ]);
    //     }
    //     catch (\Exception $e) {
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }


    public function resetPassword($email, $otp)
    {
        try{
            $verifyToken = VerifyToken::where('email', $email)
                ->where('token', $otp)
                ->where('is_verified', true)
                ->first();

            if (!$verifyToken) {
                return redirect()->route('forgot.password')->with('error', 'Invalid or expired token.');
            }

            return view('pages.auth.reset-password',compact('email'));
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    // public function updatePassword(Request $request,$email)
    // {
    //     try{
    //         $formFields = $request->validate([
    //             'password' => 'required|confirmed|min:8',
    //             'password_confirmation' => 'required',
    //         ]);

    //         $user = User::where('email', $email)->first();

    //         if (!$user) {
    //             return back()->withErrors(['email' => 'We could not find an account with this email address.']);
    //         }

    //         // Update the user's password
    //         $password = bcrypt($formFields['password']);
    //         $user->update(['password' => $password]);

    //         // You can also delete the used token if needed
    //         VerifyToken::where('email', $request->email)->delete();

    //         return redirect()->route('login')->with('success', 'Your password has been reset.');
    //     }
    //     catch (\Exception $e) {
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }
    // protected function generateToken()
    // {
    //     return rand(10, 1000000);
    // }
}
