<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Slider extends Component
{
    public $value;

    public $min = 0;

    public $max = 10;

    public $step = 1;

    public function updatedValue($value)
    {
        session(['sliderState' => $value]);
    }

    public function mount($value = null)
    {
        if (isset($value)) {
            $this->value = $value;
        } else {
            $this->value = session('sliderState') ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.slider');
    }
}
