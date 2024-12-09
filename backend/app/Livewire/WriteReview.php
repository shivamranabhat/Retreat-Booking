<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Package;
use App\Models\Review;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class WriteReview extends Component
{
    public $slug;
    #[Validate('required|string|max:150')]
    public $title;
    #[Validate('required|string|max:400')]
    public $description;
    #[Validate('required|numeric|min:1|max:5')]
    public $rating=0;
    public $package;
    public $review;


    public function setRating($value)
    {
        $this->rating = $value;
    }

    public function mount()
    {
        $this->package = Package::whereSlug($this->slug)->first();
        if(auth()->user())
        {
            $this->review = Review::where('user_id',auth()->user()->id)->where('package_id',$this->package->id)->first();
            if($this->review)
            {
                $this->rating = $this->review->rating;
                $this->title = $this->review->title;
                $this->description = $this->review->description;

            }
        }
    }
   

    public function saveReview()
    {
        $validated = $this->validate();
        $user = auth()->user();
        if($this->review)
        {
            $this->review->update(
               [
                'rating'=>$this->rating,
                'title'=>$this->title,
                'description'=>$this->description,
               ]
            );
            session()->flash('success','Thanks for sharing your experience!');
        }
        else{
            $slug = Str::slug(auth()->user()->name);
            Review::create($validated+[
                'user_id'=>$user->id,
                'package_id'=>$this->package->id,
                'slug'=>$this->slug
            ]);
            sleep(1);
            session()->flash('success','Thanks for sharing your experience!');
            $this->reset('rating','title','description');
        }
    }

    public function render()
    {
        return view('livewire.write-review');
    }
}
