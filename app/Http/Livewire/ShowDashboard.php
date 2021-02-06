<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class ShowDashboard extends Component
{
    public $team;

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function render()
    {
        return view('livewire.show-dashboard');
    }
}
