<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inquiry;
use App\Models\Accommodation;
use App\Models\RoomType;
use App\Models\Package;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class InquirySection extends Component
{
    public $slug;
    #[Validate('required|string')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $room_type_id;
    #[Validate('required')]
    public $people;
    #[Validate('required')]
    public $arrival_date;
    #[Validate('required')]
    public $message;
    public $price;
    public $room;
    public $package;
    public $roomDetails;

    public function mount()
    {
        $this->package = Package::whereSlug($this->slug)->first();
        $accommodation = Accommodation::find($this->package->accommodation_id);
        $roomTypes = json_decode($accommodation->room_types);  
        $this->roomDetails = RoomType::whereIn('id', $roomTypes)->get();
        if (session()->has('arrival_date')) {
            $this->start_date = session()->get('arrival_date');
        }
    }
    public function updateDate()
    {
        $this->start_date = $this->start_date;
    }
    public function updatePeople()
    {
        $this->people = $this->people;
        if($this->room)
        {
            $this->price = (int)$this->people * (int)$this->room->price;
        }
        else{
            $this->price = '';
        }
    }

    public function roomType($id)
    {
        $this->room = RoomType::find($id);
        $this->price = (int)$this->people * (int)$this->room->price;
    }

    public function send()
    {
        $validated = $this->validate();
        $slug = Str::slug($this->name.'-'.now());
        Inquiry::create($validated+[
            'package_id'=>$this->package->id,
            'slug'=>$this->slug
        ]);
        sleep(1);
        session()->flash('success','Inquiry sent successfully');
        $this->reset('name','email','start_date','end_date','people','message','room_type_id');
    }

    public function render()
    {
        return view('livewire.inquiry-section');
    }
}
