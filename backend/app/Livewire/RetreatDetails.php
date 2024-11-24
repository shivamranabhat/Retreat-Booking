<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\RoomType;
use App\Models\FeaturedPackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RetreatDetails extends Component
{
    public $retreat;
    public $slug;
    public $category;
    public $package;
    public $showFullSummary = false;
    public $showFullFeatures = false;
    public $showFullHighlights = false;
    public $showFullItineraries = false;
    public $showFullTerms = false;
    public $start_date;
    public $end_date;
    public $roomDetails;

    public function mount()
    {
        $this->category = Category::whereSlug($this->retreat)->first();
        $this->package = Package::whereSlug($this->slug)->first();
        if ($this->package && $this->package->accommodation) {
            $accommodation = $this->package->accommodation;
            $roomTypeIds = json_decode($accommodation->room_types); 
            $this->roomDetails = RoomType::whereIn('id', $roomTypeIds)->get();
        }
        if($this->package->start_date !==null && $this->package->end_date !==null)
        {
            $this->start_date = Carbon::parse($this->package->start_date)->format('M d Y');
            $this->end_date = Carbon::parse($this->package->end_date)->format('M d Y');
        }
        else{
            if (session()->has('start_date')) {
                $this->start_date = session()->get('start_date');
                $this->end_date = session()->get('end_date');
            }
        }
    }

  
    public function updateDate()
    {
        if ($this->start_date && $this->package->start_date == null) {
            $start = Carbon::parse($this->start_date);
            $this->end_date = $start->addDays($this->package->days)->format('M d Y');
            session(['start_date' => $this->start_date,'end_date'=>$this->end_date]);
        }
        else{
            $this->start_date = $this->package->start_date;
            $this->end_date = $this->package->end_date;
        }
    }
    public function selectRoom($id)
    {
        return redirect()->route('retreat.inquiry',$this->package->slug)->with('room_id',$id);
    }
 
    public function render()
    {
        $testimonials = Testimonial::get();
        return view('livewire.retreat-details', [
           
                'testimonials'=>$testimonials,
                'roomDetails' => $this->roomDetails,
        ]);
    }
}
