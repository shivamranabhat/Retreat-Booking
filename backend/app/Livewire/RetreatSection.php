<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Package;
use App\Models\Location;
use App\Models\RoomType;
use Carbon\Carbon;
use Livewire\WithPagination;

class RetreatSection extends Component
{
    use WithPagination;
    public $retreat;
    public $category;
    public $locations;
    public $rooms;
    public $location;
    public $sortFilter;
    public $priceFilter = 'all';
    public $locationFilter = 'all';
    public $roomFilter = [];
    public $dayFilter = 'all';
    public $selectedDate;

    public function mount()
    {
        $this->category = Category::whereSlug($this->retreat)->first();
        $this->locations = Location::latest()->select('id','name','slug')->get();
        $this->rooms = RoomType::latest()->select('id','name')->get();
        if (request()->segment(2) !=='') {
            $selectedLocation = request()->segment(2);
            $this->location = Location::where('slug', $selectedLocation)->first();
            $this->locationFilter = $this->location ? $this->location->id : 'all';
        }
    }

    public function redirectToDetails($slug)
    {
        return redirect()->route('retreat.details',['retreat'=>$this->retreat,'slug'=>$slug]);
    }

    public function applyPriceFilter($priceRange)
    {
        $this->priceFilter = $priceRange;
    }

    public function applyLocationFilter($locationId)
    {
        $this->locationFilter = $locationId;
        $locationSlug = 'all';
        if ($locationId !== 'all') {
            $location = Location::find($locationId);
            $locationSlug = $location ? $location->slug : 'all';
        }
        if (request()->segment(2) !=='') {
            $this->redirect(route('retreats', [
                'retreat' => $this->retreat,
                'location' => $locationSlug,
            ]));
        }
    }

    public function toggleRoomFilter($roomId)
    {
        if (in_array($roomId, $this->roomFilter)) {
            $this->roomFilter = array_diff($this->roomFilter, [$roomId]);
        } else {
            $this->roomFilter[] = $roomId;
        }
    }


    public function applyDayFilter($daysRange)
    {
        $this->dayFilter = $daysRange;
    }

    public function applySortFilter($sortOption)
    {
        $this->sortFilter = $sortOption;
    }


    public function render()
    {
        $allPackages = Package::where('category_id', $this->category->id)->paginate(4);
        $filteredPackages = $allPackages;
        
        // Sorting logic
        switch ($this->sortFilter) {
            case 'price-low-to-high':
                $filteredPackages = $filteredPackages->sortBy('price');
                break;
            case 'price-high-to-low':
                $filteredPackages = $filteredPackages->sortByDesc('price');
                break;
            case 'latest':
                $filteredPackages = $filteredPackages->sortByDesc('created_at');
                break;
            case 'oldest':
                $filteredPackages = $filteredPackages->sortBy('created_at');
                break;
        }

        //Apply price filter
        if ($this->priceFilter !== 'all') {
            switch ($this->priceFilter) {
                case '100-200':
                    $filteredPackages = $filteredPackages->whereBetween('price', [100, 200]);
                    break;
                case '200-300':
                    $filteredPackages = $filteredPackages->where('price', '>', 200)->where('price', '<=', 300);
                    break;
                case '300-400':
                    $filteredPackages = $filteredPackages->where('price', '>', 300)->where('price', '<=', 400);
                    break;
                case '400+':
                    $filteredPackages = $filteredPackages->where('price', '>=', 400);
                    break;
            }
        }
        //If user selects date from hero section
        if (session()->has('date')) {
            $sessionDate = session()->get('date'); 
            $query = Package::query();
        
            try {
                if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $sessionDate)) {
                    // Parse and filter as 'Y-m-d'
                    $parsedDate = Carbon::createFromFormat('Y-m-d', $sessionDate);
                    $query->whereDate('start_date', '=', $parsedDate->format('Y-m-d'));
                } elseif (preg_match('/^\d{4}-\d{2}$/', $sessionDate)) {
                    // Parse and filter as 'Y-m'
                    $parsedMonth = Carbon::createFromFormat('Y-m', $sessionDate);
                    $startOfMonth = $parsedMonth->startOfMonth()->format('Y-m-d');
                    $endOfMonth = $parsedMonth->endOfMonth()->format('Y-m-d');
                    $query->whereBetween('start_date', [$startOfMonth, $endOfMonth]);
                } else {
                    throw new \Exception('Invalid date format');
                }
                $query->where('category_id', $this->category->id);
            } catch (\Exception $e) {
                \Log::error('Invalid date format in session: ' . $sessionDate);
            }
        
            // Fetch filtered packages
            $filteredPackages = $query->get();
        
            // Fetch all-year available packages
            $allYearAvailablePackages = Package::whereNull('start_date')
                ->where('category_id', $this->category->id)
                ->get();
        
            // Merge filtered packages with all-year available packages
            $filteredPackages = $filteredPackages->merge($allYearAvailablePackages);
        }
        
        
        // Apply location filter
        if ($this->locationFilter !== 'all') {
            $filteredPackages = $filteredPackages->where('location_id', $this->locationFilter);
        }

        // Apply room type filter
        if (!empty($this->roomFilter)) {
            $filteredPackages = $filteredPackages->filter(function ($package) {
                $roomIds = json_decode($package->accommodation->room_types ?? '[]');
                return !empty(array_intersect($roomIds, $this->roomFilter));
            });
        }

        // Count packages per room type
        $roomPackageCount = [];
        foreach ($this->rooms as $room) {
            $count = $filteredPackages->filter(function ($package) use ($room) {
                $roomIds = json_decode($package->accommodation->room_types ?? '[]');
                return in_array($room->id, $roomIds);
            })->count();
            $roomPackageCount[$room->id] = $count;
        }

        // Apply days filter
        if ($this->dayFilter !== 'all') {
            switch ($this->dayFilter) {
                case '1-2':
                    $filteredPackages = $filteredPackages->whereBetween('days', [1, 2]);
                    break;
                case '3-4':
                    $filteredPackages = $filteredPackages->whereBetween('days', [3, 4]);
                    break;
                case '4+':
                    $filteredPackages = $filteredPackages->where('days', '>', 4);
                    break;
            }
        }

        return view('livewire.retreat-section', [
            'packages' => $filteredPackages,
            'allPackages' => $allPackages,
            'roomPackageCount' => $roomPackageCount,
        ]);
    }

}
