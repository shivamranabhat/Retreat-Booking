<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ExtraPage;

class AddedPage extends Component
{
    public $slug;
    public $page;
    public function mount()
    {
       
        $this->page = Extrapage::whereSlug($this->slug)->first();
    }
    public function render()
    {
        return view('livewire.added-page');
    }

}
