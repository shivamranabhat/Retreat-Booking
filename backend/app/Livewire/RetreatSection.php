<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Package;
use App\Models\Location;
use App\Models\RoomType;

class RetreatSection extends Component
{
    public $retreat;
    public $category;
    public $locations;
    public $rooms;
    public $packages;
    public function mount()
    {
        $this->category = Category::whereSlug($this->retreat)->first();
        $this->locations = Location::latest()->select('id','name')->get();
        $this->rooms = RoomType::latest()->select('id','name')->get();
        $this->packages = Package::where('category_id',$this->category->id)->get();
    }
    public function redirectToDetails($slug)
    {
        return redirect()->route('retreat.details',['retreat'=>$this->retreat,'slug'=>$slug]);
    }
    public function render()
    {
        return view('livewire.retreat-section');
    }
}
