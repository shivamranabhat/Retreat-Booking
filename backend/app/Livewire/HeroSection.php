<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Location;
use App\Models\BodyContent;

class HeroSection extends Component
{
    public $category;
    public $location;
    public $date;
    public $selectedLocation;
    public $selectedCategory;
    public $selectedDate;

    public function getLocation($id)
    {
        $this->location = Location::find($id);
        $this->selectedLocation = $this->location ? $this->location->name : null;
    }

    public function getCategory($id)
    {
        $this->category = Category::find($id);
        $this->selectedCategory = $this->category ? $this->category->name : null;
    }


    public function redirectToRetreat()
    {
        return redirect()->route('retreats', [
            'retreat' => $this->category ? $this->category->slug : null
        ])->with([
            'category' => $this->category ? $this->category->slug : null,
            'location' => $this->location ? $this->location->slug : null,
            'date' => $this->date ? $this->date : null
        ]);
        session([
            'category' => $this->category ? $this->category->slug : null,
            'location' => $this->location ? $this->location->slug : null,
            'date' => $this->date ? $this->date : null
        ]);
    }


    public function render()
    {
        $locations = Location::latest()->select('id','name','slug')->get();
        $categories = Category::latest()->select('id','name','slug')->get();
        $content = BodyContent::where('position','main-body')->select('title','subtitle','image')->first();
        return view('livewire.hero-section',compact('locations','categories','content'));
    }
}
