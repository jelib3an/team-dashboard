<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Api\UserController;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowEditUserForm extends Component
{
    protected $prefix = 'user';

    public $user;

    protected $listeners = [
        'resetForm',
        'userSwitched'
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
        //$this->validate();

        $response = app()->call(UserController::class.'@update', [
            'request' => (new Request())->merge($this->user),
            'id' => $this->user['id'],
        ]);

        $this->user = json_decode($response->toJson(), true);

        session()->flash('userFormMessage', 'Success!');
        $this->emit('userUpdated', $this->user);
    }

    public function render()
    {
        return view('livewire.show-edit-user-form');
    }
}
