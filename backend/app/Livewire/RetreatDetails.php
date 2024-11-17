<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\RoomType;
use App\Models\FeaturedPackage;
use Illuminate\Support\Facades\Session;

class RetreatDetails extends Component
{
    public $retreat;
    public $slug;
    public $category;
    public $package;
    public $showFullSummary = false;
    public $showAllInclusions = false;
    public $showAllExclusions = false;
    public $showFullFeatures = false;
    public $showFullHighlights = false;
    public $showFullItineraries = false;
    public $showFullTerms = false;
    public $arrival_date;
    public $roomDetails;
    public $featured;

    public function mount()
    {
        $this->category = Category::whereSlug($this->retreat)->first();
        $this->package = Package::whereSlug($this->slug)->first();
        if ($this->package && $this->package->accommodation) {
            $accommodation = $this->package->accommodation;
            $roomTypeIds = json_decode($accommodation->room_types); 
            $this->roomDetails = RoomType::whereIn('id', $roomTypeIds)->get();
        }
        if (session()->has('arrival_date')) {
            $this->arrival_date = session()->get('arrival_date');
        }
        $this->featured = FeaturedPackage::whereHas('package', function ($query) {
            $query->where('category_id', $this->category->id)
                  ->where('id', '<>', $this->package->id);
        })
        ->latest()
        ->take(4)
        ->get();
    
    }

    public function toggleInclusions()
    {
        $this->showAllInclusions = !$this->showAllInclusions;
    }
    public function toggleExclusions()
    {
        $this->showAllExclusions = !$this->showAllExclusions;
    }
    public function updateDate()
    {
        $this->arrival_date = $this->arrival_date;
        session(['arrival_date' => $this->arrival_date]);
    }
 
    public function render()
    {
        $testimonials = Testimonial::get();
        return view('livewire.retreat-details', [
            'inclusions' => $this->showAllInclusions 
                ? $this->package->inclusions 
                : $this->package->inclusions->take(2),
            'exclusions' => $this->showAllExclusions 
                ? $this->package->exclusions 
                : $this->package->exclusions->take(2),
                'testimonials'=>$testimonials,
                'roomDetails' => $this->roomDetails,
        ]);
    }
}
