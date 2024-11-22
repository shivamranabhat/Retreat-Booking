<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\VerifyToken;
use Livewire\Attributes\Validate;
use App\Models\User;

class ResetPassword extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    protected $rules = [
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];

    public function resetPassword()
    {
        $this->validate();
        
        $user = User::where('email', $this->email)->where('role', 0)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'We could not find an account with this email address.']);
        }

        // Update the user's password
        $updated = $user->update(['password' => bcrypt($this->password)]);

        if($updated)
        {
            VerifyToken::where('email', $this->email)->delete();
            return redirect()->route('login')->with('success', 'Your password has been reset.');
        }
        else
        {
            // Handle failure to update password
            return back()->withErrors(['password' => 'Failed to update password.']);
        }
}

    public function render()
    {
        return view('livewire.reset-password');
    }
}
