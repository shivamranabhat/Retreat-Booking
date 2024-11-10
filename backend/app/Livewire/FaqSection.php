<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Faq;

class FaqSection extends Component
{
    public function render()
    {
        $faqs = Faq::select('title','description')->oldest()->get();
        return view('livewire.faq-section',compact('faqs'));
    }
}
