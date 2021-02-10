<div class="md:flex md:items-center md:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
      Hello {{ $this->user['name'] ?? 'Guest' }}!
    </h2>
  </div>
  <div class="mt-4 flex md:mt-0 md:ml-4">
    @livewire('user-switcher')
    <div>
      @if (isset($this->user['name']))
        @php
          $title = "{$this->user['name']}: Edit";
        @endphp
        <x-overlays.slideover :title="$title">
          <x-slot name="button">
            <button type="button"
              class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Edit your settings
            </button>
          </x-slot>
          @livewire('show-edit-user-form', ['user' => $this->user])
        </x-overlays.slideover>
      @endif
    </div>
    @php
      $title = "{$this->teamName}: Add";
    @endphp
    <x-overlays.slideover :title="$title">
      <x-slot name="button">
        <button type="button"
          class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Add user
        </button>
      </x-slot>
      @livewire('show-add-user-form', ['teamId' => $this->teamId])
    </x-overlays.slideover>
  </div>
</div>
