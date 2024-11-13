<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WhyUs;

class WhyUsSection extends Component
{
    public function render()
    {
        $details = WhyUs::select('title','description')->oldest()->take(3)->get();
        return view('livewire.why-us-section',compact('details'));
    }
}
