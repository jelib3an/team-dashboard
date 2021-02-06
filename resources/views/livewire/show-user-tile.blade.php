<div
  class="flex flex-col bg-white overflow-hidden shadow rounded-lg"
  wire:poll.10s>
  <div class="flex-grow px-4 py-5 sm:p-6">
    <div class="flex items-center"
      x-data="{ icon: @entangle('icon') }">
      <div x-cloak x-show="icon === 'day'"
        class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
        <svg class="h-6 w-6"
          xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
      </div>
      <div x-cloak x-show="icon === 'night'"
        class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
        <svg class="h-6 w-6"
          xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
        </svg>
      </div>
      <div x-cloak x-show="icon === 'noon'"
        class="flex-shrink-0 bg-blue-500 rounded-md p-3">
        <svg class="h-6 w-6"
          xmlns="http://www.w3.org/2000/svg"
          fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
        </svg>
      </div>
      <div class="ml-5 w-0 flex-1">
        <dt
          class="text-sm font-medium text-gray-500 truncate">
          {{ $this->user->name }}
        </dt>
        <dd class="flex items-baseline">
          <div
            class="text-2xl font-semibold text-gray-900">
            {{ $this->localtime->format('D g:iA') }}
          </div>
        </dd>
      </div>
    </div>
  </div>
</div>
