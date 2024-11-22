<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VerifyToken;
use Livewire\Attributes\Validate;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

class VerifyResetToken extends Component
{
    public $email;
    #[Validate('required')]
    public $token;
    public function verifyToken()
    {
        $validated = $this->validate();
        $verifyToken = VerifyToken::where('email', $this->email)
            ->where('token', $this->token)
            ->where('is_verified', false) 
            ->first();

        if (!$verifyToken) {
            return back()->with('error', 'Invalid token. Please try again.');
        }

        // Mark the token as verified
        $verifyToken->is_verified = true;
        $verifyToken->save();

        return redirect()->route('reset.password', [
            'email' => $this->email,
            'otp' => $this->token,
        ]);
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

        Mail::to($this->email)->send(new ResetPassword($userExists->name,$this->email,$token));
        session()->flash('success','Otp sent successfully');
    }
    protected function generateToken()
    {
        return rand(10, 1000000);
    }

    public function render()
    {
        return view('livewire.verify-reset-token');
    }
}
