<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inquiry;
use App\Models\Accommodation;
use App\Models\RoomType;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryNotification;

class InquirySection extends Component
{
    public $slug;
    public $email;
    public $room_type_id;
    public $people=1;
    public $start_date;
    public $message;
    public $price;
    public $room;
    public $package;
    public $roomDetails;
    public $end_date;
    public $room_id;
    public $name = [];

   protected $rules = [

        'email' => 'required|email',
        'room_type_id' => 'required',
        'people' => 'required|integer|min:1',
        'start_date' => 'required',
        'message' => 'required',
        'name.*' => 'required', 
    ];


    protected $listeners = ['roomSelected'];

    public function mount()
    {
        $this->package = Package::whereSlug($this->slug)->first();
        $accommodation = Accommodation::find($this->package->accommodation_id);
        $roomTypes = json_decode($accommodation->room_types);  
        $this->roomDetails = RoomType::whereIn('id', $roomTypes)->get();
        $this->email = auth()->user() ? auth()->user()->email : '';
        if (session()->has('start_date')) {
            $this->start_date = session()->get('start_date');
            $this->end_date = Carbon::parse($this->start_date)
            ->addDays($this->package->days)
            ->format('M jS Y');
        }
        
        if ($this->package->start_date) 
        {
            $this->start_date = Carbon::parse($this->package->start_date)->format('M jS') 
                                . ' to ' 
                                . Carbon::parse($this->package->end_date)->format('M jS Y');
        }
        
        if (session()->has('room_id')) {
            $this->room_id = session()->get('room_id');
            $this->room_type_id = $this->room_id;
            $this->room = RoomType::find($this->room_type_id);
            $this->price = number_format($this->package->price + ($this->room->percentage/100) * ($this->package->price),0);
        }
        else{
            $this->price = number_format($this->package->price,0);
        }
    }
    public function roomSelected($id)
    {
        $this->room_id = $id;
    }

    public function updatedPeople($value)
    {
        $this->name = array_fill(0, $value, '');
    }    


    public function updateDate()
    {
        $this->start_date = $this->start_date;
        $this->end_date = Carbon::parse($this->start_date)
        ->addDays($this->package->days)
        ->format('M jS Y');
    }

    public function roomType($id)
    {
        $this->room = RoomType::find($id);
        if (!$this->room) {
            $this->price = (int)$this->package->price * (int)$this->people;
            return;
        }
        if(!$this->room->percentage){
            $this->price =  (int)$this->package->price * (int)$this->people;
        }else{
            $this->price =  ((int)$this->package->price + ($this->room->percentage/100) * ($this->package->price)) * (int)$this->people;
        }
    }

    public function send()
    {
        $this->validate();
        $firstName = [];
        foreach ($this->name as $firstOne) {
            $nameParts = explode(' ', $firstOne);
            $firstName[] = $nameParts[0]; 
        }
        Inquiry::create([
            'package_id' => $this->package->id,
            'slug' => Str::slug($firstName[0]. '-' . now()),
            'email' => $this->email,
            'room_type_id' => $this->room_type_id,
            'people' => $this->people,
            'start_date' => $this->start_date,
            'message' => $this->message,
            'name' => json_encode($this->name),
        ]);
        sleep(1);
        session()->flash('success','Inquiry sent successfully');
        $name = $firstName[0];
        $category_name = $this->package->category->name;
        $start_date = $this->start_date ? $this->start_date : $this->package->start_date;
        $end_date = $this->end_date ? $this->end_date : $this->package->end_date;
        $package_name = $this->package->title;
        $location_name = $this->package->location->name;
        $room_name = $this->room->name;
        Mail::to($this->email)->send(new InquiryNotification($name,$category_name,$package_name,$start_date,$end_date,$location_name,$this->people,$room_name));
        if(!$this->package->start_date)
        {
            $this->reset('start_date','end_date');
        }
        $this->reset('name','email','people','message','room_type_id');
    }
    public function increasePeople()
    {
        $this->people +=1;
        if($this->room_type_id)
        {
            $this->price = ((int)$this->package->price + ($this->room->percentage/100) * ($this->package->price)) * (int)$this->people;
        }
        else{
            $this->price = ((int)(number_format($this->package->price,0)))*$this->people;
        }
    }
    public function decreasePeople()
    {
        if($this->people >1)
        {
            $this->people -=1;
        }
        if($this->room_type_id)
        {
            $this->price = ((int)$this->package->price + ($this->room->percentage/100) * ($this->package->price)) * (int)$this->people;
        }
        else{
            $this->price =  ((int)(number_format($this->package->price,0)))*(int)$this->people;
        }
    }

    public function render()
    {
        return view('livewire.inquiry-section');
    }
}
