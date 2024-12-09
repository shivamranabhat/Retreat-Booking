<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\RoomType;
use App\Models\Review;
use App\Models\FeaturedPackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class RetreatDetails extends Component
{
    use WithPagination;
    public $retreat;
    public $slug;
    public $category;
    public $package;
    public $location;
    public $showFullSummary = false;
    public $showFullFeatures = false;
    public $showFullHighlights = false;
    public $showFullItineraries = false;
    public $showFullTerms = false;
    public $start_date;
    public $end_date;
    public $roomDetails;
    public $sortFilter;
    public $limit = 4;
    public $disable= false;

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
            $this->disable = true;
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
        $this->start_date = $this->start_date;
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
        return redirect()->route('retreat.inquiry',['retreat'=>$this->retreat,'location'=>$this->location,'slug'=>$this->package->slug])->with('room_id',$id);
    }

    public function loadMore()
    {
        $this->limit += 4;
    }
    public function applySortFilter($sortOption)
    {
        $this->sortFilter = $sortOption;
    }

 
    public function render()
    {  
        $reviews = Review::where('package_id',$this->package->id)->paginate($this->limit);
        switch ($this->sortFilter) {
            case 'highest':
                $reviews = $reviews->sortByDesc('rating');
                break;
            case 'lowest':
                $reviews = $reviews->sortBy('rating');
                break;
            case 'latest':
                $reviews = $reviews->sortByDesc('created_at');
                break;
            case 'oldest':
                $reviews = $reviews->sortBy('created_at');
                break;
        }
        $total = Review::where('package_id',$this->package->id)->get()->count();
        $excellent = Review::where('package_id',$this->package->id)->where('rating',5)->get()->count();
        $good = Review::where('package_id',$this->package->id)->where('rating',4)->get()->count();
        $average = Review::where('package_id',$this->package->id)->where('rating',3)->get()->count();
        $poor = Review::where('package_id',$this->package->id)->where('rating',2)->get()->count();
        return view('livewire.retreat-details', [
                'reviews' => $reviews,
                'total'=>$total,
                'excellent'=>$excellent,
                'good'=>$good,
                'average'=>$average,
                'poor'=>$poor,
                'roomDetails' => $this->roomDetails,
        ]);
    }
}
