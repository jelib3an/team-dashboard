<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Api\UserController;
use App\Http\Livewire\Traits\WithBlackoutTimes;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowEditUserForm extends Component
{
    use WithBlackoutTimes;

    public $user;

    protected $listeners = [
        'resetForm',
        'userSwitched',
    ];

    public function mount(array $user)
    {
        $this->user = $user;
    }

    public function resetForm()
    {
        $this->user = json_decode((new ResourcesUser(User::findOrFail($this->user['id'])))->toJson(), true);
        $this->resetValidation();
    }

    public function userSwitched(?array $user)
    {
        if ($user) {
            $this->user = $user;
        }
    }

    public function save()
    {
        return false;
        $response = app()->call(UserController::class.'@update', [
            'request' => (new Request())->merge($this->user),
            'id' => $this->user['id'],
        ]);

        $this->user = json_decode($response->toJson(), true);

        session()->flash('userFormMessage', 'Success!');
        $this->emit('userUpdated', $this->user);
    }

    public function deleteUser()
    {
        return false;
        $slug = $this->user['team']['slug'];
        $response = app()->call(UserController::class.'@destroy', [
            'id' => $this->user['id'],
        ]);

        return redirect()->to("/$slug");
    }

    public function render()
    {
        return view('livewire.show-user-form');
    }
}
