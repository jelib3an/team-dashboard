<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowHeader extends Component
{
    public $user;

    public $team;

    protected $listeners = ['userSwitched'];

    public function userSwitched($userId)
    {
        $this->user = null;
        if ($userId) {
            $this->user = User::findOrFail($userId);
        }
    }

    public function render()
    {
        return view('livewire.show-header');
    }
}
