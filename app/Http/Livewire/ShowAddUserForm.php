<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Api\UserController;
use App\Http\Livewire\Traits\WithBlackoutTimes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowAddUserForm extends Component
{
    use WithBlackoutTimes;

    public $user;

    protected $listeners = [
        'resetForm',
    ];

    public function mount(int $teamId)
    {
        $this->user = [
            'name' => '',
            'timezone' => 'America/New_York',
            'team_id' => $teamId,
            'blackoutTimes' => [],
        ];
    }

    public function resetForm()
    {
        $this->mount($this->user['team_id']);
        $this->resetValidation();
    }

    public function save()
    {
        $response = app()->call(UserController::class.'@store', [
            'request' => (new Request())->merge($this->user),
        ]);

        $this->user = json_decode($response->toJson(), true);

        Auth::logout();
        Auth::loginUsingId($this->user['id']);
        return redirect()->to("/{$this->user['team']['slug']}");
    }

    public function render()
    {
        return view('livewire.show-user-form');
    }
}
