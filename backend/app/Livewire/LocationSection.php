<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Location;

class LocationSection extends Component
{
    public function redirectToLocation($id)
    {
        $location = Location::find($id);
        return redirect()->route('home.location',$location->slug);
    }
    public function render()
    {
        $locations = Location::latest()->get();
        return view('livewire.location-section',compact('locations'));
    }
}
