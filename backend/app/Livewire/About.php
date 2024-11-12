<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BodyContent;

class About extends Component
{
    public function render()
    {
        $content = BodyContent::select('title','image','alt','subtitle')->where('position','about-body')->first();
        return view('livewire.about',compact('content'));
    }
}
