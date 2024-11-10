<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class Newsletter extends Component
{
    #[Validate('required|email|unique:subscribers')]
    public $email;
    public function subscribe()
    {
        $validated = $this->validate();
        $slug = Str::slug($validated['email']);
        sleep(1);
        Subscriber::create($validated+['slug'=>$slug]);
        $this->email="";
        session()->flash('success','Email subscribed successfully');
    }
    
    public function render()
    {
        return view('livewire.newsletter');
    }
}

