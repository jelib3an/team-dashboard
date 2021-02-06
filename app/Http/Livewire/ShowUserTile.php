<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ShowUserTile extends Component
{
    public $user;

    public $localtime;

    public $icon = 'day';

    public $shade = 400;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->localtime = Carbon::now($this->user->timezone);

        $hour = $this->localtime->hour;
        if ($hour >= 20 || $hour <= 8) {
            $this->icon = 'night';
        } elseif ($hour >= 12) {
            $this->icon = 'noon';
        }

        $this->shade = ($hour % 9) * 100 ?? 100;
    }

    public function render()
    {
        return view('livewire.show-user-tile');
    }
}
