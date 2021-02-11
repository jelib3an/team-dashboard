<?php

namespace App\Http\Livewire;

use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ShowUserTile extends Component
{
    protected $addMinute = 0;

    public $user;

    public $isYou;

    public $icon = 'day';

    protected $listeners = ['sliderChanged', 'userSwitched', 'userUpdated'];

    public function userSwitched(?array $user)
    {
        $this->isYou = ($user['id'] ?? null) == $this->user['id'];
    }

    public function userUpdated(?array $user)
    {
        if ($this->user['id'] == $user['id']) {
            $this->user = $user;
        }
    }

    public function sliderChanged($value)
    {
        $this->addMinute = $value;
        $this->changeIcon();
        session(['sliderState' => $value]);
    }

    public function mount(User $user)
    {
        $this->user = json_decode((new ResourcesUser($user))->toJson(), true);
        $this->isYou = $user->id == optional(request()->user())->id;
        session(['sliderState' => 0]);
        $this->changeIcon();
    }

    public function hydrate()
    {
        $this->addMinute = session('sliderState') ?? 0;
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
        return $this->user['name'];
    }

    public function getLocaltimeProperty()
    {
        return Carbon::now($this->user['timezone'])->addMinutes($this->addMinute);
    }

    public function getUnavailabilityTextProperty()
    {
        $localtime = $this->getLocaltimeProperty();
        $blackouts = collect($this->user['blackoutTimes'])->filter(function ($blackout) use ($localtime) {
            $parsed = explode(':', $blackout['local_begin_time']);
            $begin = $localtime->copy()
                        ->setHour(intval($parsed[0]))
                        ->setMinute(intval($parsed[1]))
                        ->setSecond(0);

            $parsed = explode(':', $blackout['local_end_time']);
            $end = $localtime->copy()
                        ->setHour(intval($parsed[0]))
                        ->setMinute(intval($parsed[1]))
                        ->setSecond(0);

            $day = $begin->format('D');
            if ($begin <= $end) {
                if (in_array($day, $blackout['days']) && $begin <= $localtime && $localtime <= $end) {
                    return true;
                }
            } else {
                // range spans multiple multiple days, break it up into two chunks

                // if localtime is before midnight - check if it is between begin and midnight
                if (in_array($day, $blackout['days']) && $begin <= $localtime && $localtime <= $begin->copy()->endOfDay()) {
                    return true;
                }

                // if localtime is after midnight - check if it is between midnight and end
                $yesterday = $begin->copy()->subDay()->format('D');
                if (in_array($yesterday, $blackout['days']) && $end->copy()->startOfDay() <= $localtime && $localtime <= $end) {
                    return true;
                }
            }

            return false;
        });

        return $blackouts->first()['label'] ?? '';
    }

    public function render()
    {
        return view('livewire.show-user-tile');
    }
}
