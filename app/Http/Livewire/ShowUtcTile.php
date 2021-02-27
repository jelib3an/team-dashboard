<?php

namespace App\Http\Livewire;

use App\Models\User;

class ShowUtcTile extends ShowUserTile
{
    public function mount(User $user)
    {
        $this->user = [
            'id' => 'utc',
            'name' => 'Universal Time',
            'timezone' => 'Etc/UTC',
            'blackoutTimes' => [],
        ];
    }
}
