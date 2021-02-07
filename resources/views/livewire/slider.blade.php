<div x-data>
  <input x-ref="sliderInput" oninput="Livewire.emit('sliderChanged', this.value)" wire:model="value"
    type="range" class="w-full" min="{{ $this->min }}" max="{{ $this->max }}"
    step="{{ $this->step }}" />

  <div x-cloak x-show="$refs.sliderInput.value > 0" class="rounded-md bg-yellow-50 p-4">
    <div class="flex">
      <div class="flex-shrink-0">
        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
          fill="currentColor">
          <path fill-rule="evenodd"
            d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
            clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        <p class="text-sm font-medium text-yellow-600">
          Great Scott! Going back to the future.
        </p>
      </div>
    </div>
  </div>
</div>
