<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ShowUserTile extends Component
{
    protected $addMinute;

    public $user;

    public $isYou;

    public $icon = 'day';

    protected $listeners = ['sliderChanged', 'userSwitched'];

    public function userSwitched($userId)
    {
        $this->isYou = $userId == $this->user->id;
    }

    public function sliderChanged($value)
    {
        $this->addMinute = $value;
        $this->changeIcon();
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isYou = $user->id == optional(request()->user())->id;
        $this->addMinute = session('sliderState') ?? 0;
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

    public function getDisplayNameProperty()
    {
        if ($this->isYou) {
            return 'YOU!';
        }
        return $this->user->name;
    }

    public function getLocaltimeProperty()
    {
        return Carbon::now($this->user->timezone)->addMinutes($this->addMinute);
    }

    public function getUnavailabilityTextProperty()
    {
        $localtime = $this->getLocaltimeProperty();
        $blackouts = $this->user->blackoutTimes->filter(function ($blackout) use ($localtime) {
            $beginString = $localtime->format('Y-m-d ') . $blackout->local_begin_time;
            $begin = new Carbon($beginString, $this->user->timezone);

            $endString = $localtime->format('Y-m-d ') . $blackout->local_end_time;
            $end = new Carbon($endString, $this->user->timezone);

            $day = $localtime->format('D');

            if (in_array($day, $blackout->days) && $begin <= $localtime && $localtime <= $end) {
                return true;
            }
            return false;
        });

        return optional($blackouts->first())->label ?? '';
    }

    public function render()
    {
        return view('livewire.show-user-tile');
    }
}
