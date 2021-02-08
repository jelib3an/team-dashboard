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

    public function save()
    {
        $this->validate();
        $this->user->save();
        // TODO adding and deleting
        $this->blackoutTimes->each(function ($blackoutTime) {
            $blackoutTime->save();
        });
    }

    public function render()
    {
        return view('livewire.show-edit-user-form');
    }
}
