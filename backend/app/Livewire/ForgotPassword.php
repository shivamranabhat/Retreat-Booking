<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\VerifyToken;
use App\Models\User;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;
    public function sendResetOtp()
    {
        $validated = $this->validate();
        $user = User::where('email', $this->email)->where('role',0)->first();

        if (!$user) {
            return back()->with('error', 'There is no account with this email address.');
        }

        $token = $this->generateToken();
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
        $name = $user->name;
        $email = $user->email;
        Mail::to($this->email)->send(new ResetPassword($name,$email,$token));
        return Redirect::to('/send-reset-otp/email=' . $this->email)->with(['token' => $token, 'email' => $this->email]);
    }
    protected function generateToken()
    {
        return rand(10, 1000000);
    }
    public function render()
    {
        return view('livewire.forgot-password');
    }
}
