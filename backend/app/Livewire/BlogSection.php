<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;

class BlogSection extends Component
{
    public function render()
    {
        $blogs = Blog::latest()->take(3)->select('title','main_image','main_img_alt','author','slug','created_at')->get();
        return view('livewire.blog-section',compact('blogs'));
    }
}
