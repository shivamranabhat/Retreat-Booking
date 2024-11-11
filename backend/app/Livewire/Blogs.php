<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;

class Blogs extends Component
{
    public function render()
    {
        $blogs = Blog::latest()->select('title','main_image','main_img_alt','author','slug','created_at')->paginate(6);
        return view('livewire.blogs',compact('blogs'));
    }
}
