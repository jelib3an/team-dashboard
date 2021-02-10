<?php

namespace App\Http\Livewire;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSwitcher extends Component
{
    public $selectedUserId;

    public function mount()
    {
        $this->selectedUserId = optional(request()->user())->id;
    }

    public function getOptionsProperty()
    {
        return User::orderBy('name')->pluck('name', 'id');
    }

    public function updatedSelecteduserid($value)
    {
        if (request()->user()) {
            Auth::logout();
        }

        $user = null;
        if ($value > 0) {
            $user = User::findOrFail($value);
            Auth::login($user);
            $user = json_decode((new ResourcesUser($user))->toJson(), true);
        }

        $this->emit('userSwitched', $user);
    }

    public function render()
    {
        return view('livewire.user-switcher');
    }
}
