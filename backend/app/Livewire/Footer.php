<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactDetail;
use App\Models\FeaturedPackage;
use App\Models\BodyContent;

class Footer extends Component
{
    public function render()
    {
        $details = ContactDetail::first();
        $content = BodyContent::select('title','subtitle')->where('position','footer')->first();
        $featured = FeaturedPackage::latest()
        ->take(2)
        ->get();
        return view('livewire.footer',compact('details','content','featured'));
    }
}
