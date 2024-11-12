<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamSection extends Component
{
    public $limit = 4;
    public $allLoaded = false;

    public function loadMore()
    {
        $totalTeams = Team::count();

        $this->limit += 4;
        if ($this->limit >= $totalTeams) {
            $this->limit = $totalTeams; 
            $this->allLoaded = true;
        }
    }
    public function seeLess()
    {
        $this->limit = 4;
        $this->allLoaded = false;
    }

    public function render()
    {
        $teams = Team::select('name','image','alt','role')->latest()
        ->take($this->limit)
        ->get();;
        return view('livewire.team-section',compact('teams'));
    }
}
