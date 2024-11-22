<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VerifyToken;
use App\Mail\VerifyUser;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;

class Register extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required',
    ];
    protected function messages()
    {
        return [
            'email.unique'=>'Account with this email already exists.'
        ];
    }

    public function register()
    {
        try{
            $validated = $this->validate();
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $validToken = rand(10, 1000000);
            $verifyToken = new VerifyToken();
            $verifyToken->token = $validToken;
            $verifyToken->email = $validated['email'];
            $verifyToken->save();
            $name = $validated['name'];
            $email = $validated['email'];
            Mail::to($this->email)->send(new VerifyUser($name,$email,$validToken));
            return redirect()->route('account.verify', ['email' => $this->email]);
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            if ($e->validator->errors()->has('email')) {
                session()->flash('error', $e->validator->errors()->first('email'));
            }
    
            throw $e;
        }
    }


    public function render()
    {
        return view('livewire.register');
    }
}
