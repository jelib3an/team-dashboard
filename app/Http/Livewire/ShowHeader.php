<?php

namespace App\Http\Livewire;

use App\Http\Resources\User as ResourcesUser;
use Livewire\Component;

class ShowHeader extends Component
{
    public $user;

    public $teamId;

    public $teamName;

    protected $listeners = ['userSwitched'];

    public function userSwitched(?array $user)
    {
        $this->user = $user;
    }

    public function mount($user, $team)
    {
        if ($user) {
            $this->user = json_decode((new ResourcesUser($user))->toJson(), true);
        }
        $this->teamId = $team->id;
        $this->teamName = $team->name;
    }

    public function render()
    {
        return view('livewire.show-header');
    }
}
