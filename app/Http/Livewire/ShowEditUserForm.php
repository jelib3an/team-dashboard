<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Timezones\Timezones;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ShowEditUserForm extends Component
{
    public $user;

    public $blackoutTimes;

    protected $listeners = ['resetForm'];

    protected $messages = [
        'blackoutTimes.*.label.required' => 'The activity field is required.',
        'blackoutTimes.*.days.min' => 'The recurring days field must have at least :min items.',
    ];

    protected function rules()
    {
        return  [
            'user.name' => [
                'required',
                'string',
                'min:1',
                Rule::unique('users', 'name')->ignore($this->user->id),
            ],
            'user.timezone' => [
                'required',
                Rule::in(Timezones::$all),
            ],
            'blackoutTimes.*.label' => 'required',
            'blackoutTimes.*.days' => 'array|min:1',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->blackoutTimes = $user->blackoutTimes;
    }

    public function resetForm()
    {
        $this->user->refresh();
        $this->blackoutTimes = $this->user->blackoutTimes;
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
        // TODO adding and deleting
        $this->blackoutTimes->each(function ($blackoutTime) {
            $blackoutTime->save();
        });
        session()->flash('userFormMessage', 'Success!');
    }

    public function render()
    {
        return view('livewire.show-edit-user-form');
    }
}
