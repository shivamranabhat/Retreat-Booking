<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactDetail;
use App\Models\BodyContent;

class Footer extends Component
{
    public function render()
    {
        $details = ContactDetail::first();
        $content = BodyContent::select('title','subtitle')->where('position','footer')->first();
        return view('livewire.footer',compact('details','content'));
    }
}
