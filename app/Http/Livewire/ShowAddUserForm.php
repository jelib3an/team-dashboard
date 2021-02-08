<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAddUserForm extends Component
{
    public $team;

    public function render()
    {
        return view('livewire.show-add-user-form');
    }
}
