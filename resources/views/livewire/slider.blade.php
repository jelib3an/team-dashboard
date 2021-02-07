<div>
  <input oninput="Livewire.emit('sliderChanged', this.value)" wire:model="value" type="range"
    class="w-full" min="{{ $this->min }}" max="{{ $this->max }}" step="{{ $this->step }}" />
</div>
