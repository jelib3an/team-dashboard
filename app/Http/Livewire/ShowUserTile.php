<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ShowUserTile extends Component
{
    public $user;

    protected $addMinute = 0;

    public $icon = 'day';

    protected $listeners = ['sliderChanged'];

    public function sliderChanged($value)
    {
        $this->addMinute = $value;
        $this->changeIcon();
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->changeIcon();
    }

    public function changeIcon()
    {
        $this->icon = 'day';

        $hour = $this->getLocaltimeProperty()->hour;
        if ($hour >= 20 || $hour <= 7) {
            $this->icon = 'night';
        } elseif ($hour >= 14) {
            $this->icon = 'noon';
        }
    }

    public function getLocaltimeProperty()
    {
        return Carbon::now($this->user->timezone)->addMinutes($this->addMinute);
    }

    public function render()
    {
        return view('livewire.show-user-tile');
    }
}
