<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;

class BlogDetails extends Component
{
    public $slug;
    public $details;
    
    public function mount()
    {
        $this->details = Blog::whereSlug($this->slug)->first();
    }

    public function render()
    {
        return view('livewire.blog-details');
    }
}
