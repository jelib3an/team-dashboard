<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserSwitcher extends Component
{
    public $options;

    public $selectedUserId;

    public function mount()
    {
        $this->options = User::orderBy('name')->get(['id', 'name']);
        $this->selectedUserId = optional(request()->user())->id;
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
        }

        $this->emit('userSwitched', $user->id ?? null);
    }

    public function render()
    {
        return view('livewire.user-switcher');
    }
}
