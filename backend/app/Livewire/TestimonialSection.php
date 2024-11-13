<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;

class TestimonialSection extends Component
{
    public function render()
    {
        $testimonials = Testimonial::get();
        return view('livewire.testimonial-section',compact('testimonials'));
    }
}
