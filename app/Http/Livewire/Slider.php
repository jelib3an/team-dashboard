<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Slider extends Component
{
    public $value = 0;

    public $min = 0;

    public $max = 10;

    public $step = 1;

    public function updatedValue($value)
    {
        $this->emit('sliderChanged', $value);
    }

    public function render()
    {
        return view('livewire.slider');
    }
}
