<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;

class GallerySection extends Component
{
    public function render()
    {
        $galleries = Gallery::select('image')->latest()->get();
        return view('livewire.gallery-section',compact('galleries'));
    }
}
