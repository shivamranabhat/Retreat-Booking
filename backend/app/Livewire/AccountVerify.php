<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VerifyToken;
use App\Models\User;
use Livewire\Attributes\Validate;
use App\Mail\VerifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class AccountVerify extends Component
{
    #[Validate('required')]
    public $token;
    public $email;
    public function verifyOtp()
    {
        $validated = $this->validate();
        $verifytoken = VerifyToken::where('token', $this->token)->first();
        if ($verifytoken) {
            $user = User::where('email', $verifytoken->email)->first();
            if ($user) 
            {
                $user->is_verified = 1;
                $user->email_verified_at = Carbon::now();
                $user->save();
                $verifytoken->delete();
                Auth::login($user);
                return redirect('/')->with('success', 'Your account has been activated successfully');
            } 
            else 
            {
                return redirect()->back()->with('error', 'Invalid OTP! Please check your email');
            }
        }
    }
    public function resendOtp()
    {
        $token = $this->generateToken();
        $userExists = User::where('email',$this->email)->first();
        if(!$userExists)
        {
            return Redirect::to('/verify/email=' . $this->email)->with('error','User with this email doesnot exists');
        }
        $existingToken = VerifyToken::where('email',$this->email)->first();
        if($existingToken)
        {
            $existingToken->delete();
        }
        VerifyToken::create([
            'token' => $token,
            'email' => $this->email,
            'is_verified' => false,
        ]);

        Mail::to($this->email)->send(new VerifyUser($userExists->name,$this->email,$token));
        session()->flash('success','Otp sent successfully');
    }
    protected function generateToken()
    {
        return rand(10, 1000000);
    }

    public function render()
    {
        return view('livewire.account-verify');
    }
}
