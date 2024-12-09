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
        $formattedDate = null;

        if ($this->date) {
            // Check for a specific pattern to determine the date format
            if (preg_match('/^\d{1,2} \w+ \d{4}$/', $this->date)) {
                // If the date is in the format '28 Nov 2024'
                $formattedDate = \Carbon\Carbon::createFromFormat('d M Y', $this->date)->format('Y-m-d');
            } elseif (preg_match('/^\w+ \d{4}$/', $this->date)) {
                // If the date is in the format 'Nov 2024'
                $formattedDate = \Carbon\Carbon::createFromFormat('M Y', $this->date)->format('Y-m');
            }
        }    
        return redirect()->route('retreats', [
            'retreat' => $this->category ? $this->category->slug : null,
            'location'=>$this->location ? $this->location->slug : null
        ])->with([
            'category' => $this->category ? $this->category->slug : null,
            'location' => $this->location ? $this->location->slug : null,
            'date' => $formattedDate
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
