<form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200">
  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
      <div class="space-y-6 sm:space-y-5">
        <div
          class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Name
          </label>
          <div class="mt-1 sm:mt-0 relative sm:col-span-2">
            <input wire:model="user.name" type="text" name="name" id="name"
              autocomplete="given-name"
              class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
            @error('user.name')
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
                </svg>
              </div>
            @enderror
          </div>
          @error('user.name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <div
          class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Timezone
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            @php
              $timezones = \App\Timezones\Timezones::$all;
            @endphp
            <x-forms.select wire:model="user.timezone" id="timezone" name="timezone"
              autocomplete="timezone" :options="array_combine($timezones, $timezones)" />
          </div>
        </div>
      </div>

      <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Unavailable Times
          </h3>
        </div>

        @foreach ($this->blackoutTimes as $i => $blackoutTime)
          <div wire:key="user-blackout-{{ $blackoutTime->id }}" class="space-y-4 sm:space-y-3">
            <div
              class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="activity-{{ $i }}"
                class="mt-4 block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Activity
              </label>
              <div class="relative mt-1 sm:mt-0 sm:col-span-2">
                <input wire:model="blackoutTimes.{{ $i }}.label" type="text"
                  name="activity-{{ $i }}" id="activity-{{ $i }}"
                  autocomplete="activity" placeholder="eg. Meeting, Sleeping"
                  class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                @error("blackoutTimes.$i.label")
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                @enderror
              </div>
              @error("blackoutTimes.$i.label")
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="begin-{{ $i }}"
                class="mt-4 block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                Begin time (24-format)
              </label>
              <div class="relative mt-1 sm:mt-0 sm:col-span-2">
                <input wire:model="blackoutTimes.{{ $i }}.local_begin_time" type="text"
                  name="begin-{{ $i }}" id="begin-{{ $i }}"
                  placeholder="13:00"
                  class="max-w-lg block min-w-min shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                @error("blackoutTimes.$i.local_begin_time")
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                @enderror
              </div>
              @error("blackoutTimes.$i.local_begin_time")
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
              <label for="end-{{ $i }}"
                class="mt-4 block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                End time (24-format)
              </label>
              <div class="relative mt-1 sm:mt-0 sm:col-span-2">
                <input wire:model="blackoutTimes.{{ $i }}.local_end_time" type="text"
                  name="end-{{ $i }}" id="end-{{ $i }}" placeholder="15:30"
                  class="max-w-lg block min-w-min shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                @error("blackoutTimes.$i.local_end_time")
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                    </svg>
                  </div>
                @enderror
              </div>
              @error("blackoutTimes.$i.local_end_time")
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
              <div class="pt-1 sm:pt-5">
                <div role="group" aria-labelledby="label-recurring">
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                    <div>
                      <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                        id="label-recurring">
                        Recurring
                      </div>
                      @error("blackoutTimes.$i.days")
                        <p class="mt-2 text-sm text-red-600">{{ $message }}
                        </p>
                      @enderror
                    </div>
                    <div class="min-w-max mt-2 grid grid-cols-2">
                      @php
                        $days = [
                            'Sun' => 'Sunday',
                            'Mon' => 'Monday',
                            'Tue' => 'Tuesday',
                            'Wed' => 'Wednesday',
                            'Thu' => 'Thursday',
                            'Fri' => 'Friday',
                            'Sat' => 'Saturday',
                        ];
                      @endphp
                      @foreach ($days as $key => $day)
                        <div class="max-w-lg space-y-4">
                          <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                              <input wire:model="blackoutTimes.{{ $i }}.days"
                                value="{{ $key }}"
                                id="days-{{ $i }}-{{ $key }}"
                                name="days-{{ $i }}-{{ $key }}"
                                type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="days-{{ $i }}-{{ $key }}"
                                class="font-medium text-gray-700">{{ $day }}</label>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="pt-5">
        <div class="flex justify-end">
          @if (session()->has('userFormMessage'))
            <x-feedback.alert-success :message="session('userFormMessage')" />
          @endif
          <x-elements.button-gray @click.prevent="open = false">Close</x-elements.button-gray>
          <x-elements.button-gray wire:click="resetForm">Reset</x-elements.button-gray>
          <x-elements.button-indigo type="submit">Save</x-elements.button-indigo>
        </div>
      </div>
    </div>
  </div>
</form>
