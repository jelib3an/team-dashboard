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
        <div>
          <x-elements.button-gray x-data="" @click="$dispatch('toggle-edit-overlay')">
            Edit your settings
          </x-elements.button-gray>
          <x-overlays.slideover listen="toggle-edit-overlay" :title="$this->user['name'].': Edit'">
            @livewire('show-edit-user-form', ['user' => $this->user])
          </x-overlays.slideover>
        </div>
      @endif
    </div>
    <div>
      <x-elements.button-indigo x-data="" @click="$dispatch('toggle-add-overlay')">
        Add user
      </x-elements.button-indigo>
      <x-overlays.slideover listen="toggle-add-overlay" :title="$this->teamName.': Add'">
        @livewire('show-add-user-form', ['teamId' => $this->teamId])
      </x-overlays.slideover>
    </div>
  </div>
</div>
