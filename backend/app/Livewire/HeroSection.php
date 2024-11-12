<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Location;
use App\Models\BodyContent;

class HeroSection extends Component
{
    public $selectedLocation;
    public $selectedCategory;
    public $selectedDate;

    public function getLocation($id)
    {
        $location = Location::find($id);
        $this->selectedLocation = $location->name;
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        $this->selectedCategory = $category->name;
    }

    public function getDate($value)
    {
        $this->selectedDate = $value;
        dd($this->selectedDate);
    }

    public function render()
    {
        $locations = Location::latest()->select('id','name','slug')->get();
        $categories = Category::latest()->select('id','name','slug')->get();
        $content = BodyContent::where('position','main-body')->select('title','subtitle','image')->first();
        return view('livewire.hero-section',compact('locations','categories','content'));
    }
}
