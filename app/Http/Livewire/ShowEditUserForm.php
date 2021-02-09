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
        'blackoutTimes.*.*.required' => 'Field is required.',
        'blackoutTimes.*.days.min' => 'Recurring days must have at least :min items.',
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
            'blackoutTimes.*.local_begin_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value)) {
                        $fail('Time must be in 24-hour format (eg. 13:00)');
                    }
                },
            ],
            'blackoutTimes.*.local_end_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value)) {
                        $fail('Time must be in 24-hour format (eg. 13:00)');
                    }
                },
            ],
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
