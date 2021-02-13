{{-- requires lodash --}}
{{-- Required props:
  * options: a normalized array of options each with keys ['id' => $id, 'text' => $text]
  * wire:model the livewire model to bind value to --}}
<div x-data="{
  isOpen: false,
  options: {{ $options }},
  selected: $wire.entangle('{{ $attributes->wire('model')->value() }}'),
  hovered: '',
}">
  <div class="mt-1 relative">
    <button @click="isOpen = true" type="button" aria-haspopup="listbox" aria-expanded="true"
      aria-labelledby="listbox-label"
      class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      <span class="block truncate" x-text="selected"></span>
      <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        <!-- Heroicon name: soloption/selector -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
          fill="currentColor" aria-hoptionden="true">
          <path fill-rule="evenodd"
            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    <div x-cloak x-show="isOpen" @click.away="isOpen = false"
      x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0" lass="absolute mt-1 w-full rounded-md bg-white shadow-lg">
      <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label"
        aria-activedescendant="listbox-item-3"
        class="max-h-80 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
        <template x-for="option in options" :key="option.id">
          <li role="option" @mouseenter.debounce.0="hovered = option.id"
            @click="selected = option.id; isOpen = false"
            :class="{ 'text-white bg-blue-500': hovered === option.id, 'text-gray-900': hovered !== option.id}"
            class="text-gray-900 cursor-default select-none relative pl-3 pr-9">
            <span class="font-normal block truncate" x-text="option.text"></span>
          </li>
        </template>
      </ul>
    </div>
  </div>
</div>
