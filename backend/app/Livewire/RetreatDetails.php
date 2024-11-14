<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\Category;

class RetreatDetails extends Component
{
    public $retreat;
    public $slug;
    public $category;
    public $package;

    public function mount()
    {
        $this->category = Category::whereSlug($this->retreat)->first();
        $this->package = Package::whereSlug($this->slug)->first();
    }

    public function render()
    {
        return view('livewire.retreat-details');
    }
}
