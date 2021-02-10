<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Api\UserController;
use App\Http\Livewire\Traits\SharesValidation;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowEditUserForm extends Component
{
    use SharesValidation;

    protected $prefix = 'user';

    public $user;

    protected $listeners = [
        'resetForm',
        'userSwitched'
    ];

    public function mount(User $user)
    {
        $this->user = json_decode((new ResourcesUser($user))->toJson(), true);
    }

    public function resetForm()
    {
        $this->user = json_decode((new ResourcesUser(User::findOrFail($this->user['id'])))->toJson(), true);
        $this->resetValidation();
    }

    public function userSwitched($userId)
    {
        if ($userId) {
            $this->user = json_decode((new ResourcesUser(User::findOrFail($userId)))->toJson(), true);
        }
    }

    public function save()
    {
        $this->validate();

        app()->call(UserController::class.'@update', [
            'request' => (new Request())->merge($this->user),
            'id' => $this->user['id'],
        ]);

        session()->flash('userFormMessage', 'Success!');
    }

    public function render()
    {
        return view('livewire.show-edit-user-form');
    }
}
