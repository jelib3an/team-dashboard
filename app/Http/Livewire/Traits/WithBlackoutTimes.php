<?php

namespace App\Http\Livewire\Traits;

use App\Http\Resources\BlackoutTime as ResourcesBlackoutTime;
use App\Models\BlackoutTime;

trait WithBlackoutTimes
{
    public function mountWithBlackoutTimes()
    {
        $this->listeners = array_merge($this->listeners, ['addBlackoutTime', 'removeBlackoutTime']);
    }

    public function addBlackoutTime()
    {
        $blackoutTime = new BlackoutTime([
            'label' => '',
            'local_begin_time' => '',
            'local_end_time' => '',
            'days' => [],
        ]);
        array_unshift($this->user['blackoutTimes'], json_decode((new ResourcesBlackoutTime($blackoutTime))->toJson(), true));
    }

    public function removeBlackoutTime(int $index)
    {
        unset($this->user['blackoutTimes'][$index]);
        $this->user['blackoutTimes'] = array_values($this->user['blackoutTimes']);
    }
}
