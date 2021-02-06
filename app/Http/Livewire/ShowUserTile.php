<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ShowUserTile extends Component
{
    public $user;

    public $localtime;

    public $addHour = 0;

    public $icon = 'day';

    protected $listeners = ['sliderChanged'];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->hydrate();
    }

    public function hydrate()
    {
        $this->localtime = Carbon::now($this->user->timezone)->addHours($this->addHour);
        $hour = $this->localtime->hour;
        if ($hour >= 20 || $hour <= 8) {
            $this->icon = 'night';
        } elseif ($hour >= 12) {
            $this->icon = 'noon';
        }
    }

    public function sliderChanged($value)
    {
        $this->addHour = $value;
        $this->hydrate();
    }

    public function render()
    {
        return view('livewire.show-user-tile');
    }
}
