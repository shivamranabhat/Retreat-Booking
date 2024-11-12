<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactDetail;
use App\Models\Message;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class Contact extends Component
{
    #[Validate('required|string')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $subject;
    #[Validate('required')]
    public $message;

    public function send()
    {
        $validated = $this->validate();
        sleep(1);
        $slug = Str::slug($validated['name'].'-'.now());
        sleep(1);
        Message::create($validated+['slug'=>$slug]);
        $this->reset();
        session()->flash('success','Message sent successfully');
    }
    public function render()
    {
        $details = ContactDetail::first();
        return view('livewire.contact',compact('details'));
    }
}
