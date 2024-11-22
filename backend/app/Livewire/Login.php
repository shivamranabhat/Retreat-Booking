<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{

    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $password;
    public $remember = false;

    public function render()
    {
        return view('livewire.login');
    }

    public function login(Request $request)
    {
        $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        } else {
           session()->flash('error','Invalid email or password');
        }
    }
}
