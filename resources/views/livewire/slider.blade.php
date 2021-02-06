<div>
  <input oninput="Livewire.emit('sliderChanged', this.value)" wire:model="value" type="range"
    class="w-full" min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" />
</div>
