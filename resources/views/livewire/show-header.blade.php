<div class="md:flex md:items-center md:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
      Hello {{ $this->user['name'] ?? 'Guest' }}!
    </h2>
  </div>
  <div class="mt-4 flex md:mt-0 md:ml-4">
    @livewire('user-switcher')
  </div>
</div>
