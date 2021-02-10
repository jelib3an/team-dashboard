<?php

namespace App\Http\Livewire;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Livewire\Component;

class ShowHeader extends Component
{
    public $user;

    public $teamId;

    public $teamName;

    protected $listeners = ['userSwitched'];

    public function userSwitched($userId)
    {
        $this->user = null;
        if ($userId) {
            $this->user = json_decode((new ResourcesUser(User::findOrFail($userId)))->toJson(), true);
        }
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
