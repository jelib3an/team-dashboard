<form wire:submit.prevent="save" class="space-y-8 divide-y divide-gray-200">
  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 sm:border-t sm:border-gray-200">
    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
      <div class="space-y-6 sm:space-y-5">
        @if (isset($this->user['id']))
          <div x-data="{ showConfirm: false }" class="flex justify-end">
            <x-elements.button-indigo x-show="!showConfirm" @click="showConfirm = true">
              Delete {{ $this->user['name'] }}
            </x-elements.button-indigo>
            <div x-cloak x-show="showConfirm">
              <span class="text-sm text-red-600">
                Really delete {{ $this->user['name'] }}?
              </span>
              <x-elements.button-gray @click="showConfirm = false">
                Cancel
              </x-elements.button-gray>
              <x-elements.button-indigo wire:click="deleteUser()">
                Do it!
              </x-elements.button-indigo>
            </div>
          </div>
        @endif

        <x-forms.input-validation name="name" label="Name" wire:model="user.name"
          placeholder="John" />

        <div>
          <label class="block text-sm font-medium text-gray-700">
            Timezone
          </label>
          <div class="mt-1 w-full sm:max-w-xs">
            @php
              $timezones = \App\Timezones\Timezones::$all;
            @endphp
            <x-forms.select2 wire:model="user.timezone"
              :options="array_combine($timezones, $timezones)" />
          </div>
        </div>
      </div>

      <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Unavailable Times
          </h3>
          <div class="flex justify-end">
            <x-elements.button-indigo wire:click="addBlackoutTime()">
              New activity
            </x-elements.button-indigo>
          </div>
        </div>

        @foreach ($this->user['blackoutTimes'] as $i => $blackoutTime)
          <div class="pt-4 space-y-6 sm:space-y-5">
            <x-forms.input-validation name="blackoutTimes.{{ $i }}.label"
              wire:model="user.blackoutTimes.{{ $i }}.label" label="Activity"
              placeholder="eg. Meeting, Sleeping" />

            <x-forms.input-validation name="blackoutTimes.{{ $i }}.local_begin_time"
              wire:model="user.blackoutTimes.{{ $i }}.local_begin_time"
              label="Begin time (24-hr format)" placeholder="13:00" />

            <x-forms.input-validation name="blackoutTimes.{{ $i }}.local_end_time"
              wire:model="user.blackoutTimes.{{ $i }}.local_end_time"
              label="End time (24-hr format)" placeholder="15:30" />

            <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
              <div class="pt-1">
                <div role="group" aria-labelledby="label-recurring">
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                    <div>
                      <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                        id="label-recurring">
                        Recurring
                      </div>
                      <div>
                        @error("blackoutTimes.$i.days")
                          <p class="mt-2 text-sm text-red-600">{{ $message }}
                          </p>
                        @enderror
                      </div>
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
                        @php
                          $prefix = $this->user['id'] ?? 'add';
                        @endphp
                        <div class="max-w-lg space-y-4">
                          <div class="relative flex items-start">
                            <div class="flex items-center h-5">
                              <input wire:model="user.blackoutTimes.{{ $i }}.days"
                                value="{{ $key }}"
                                id="{{ $prefix }}-days-{{ $i }}-{{ $key }}"
                                name="{{ $prefix }}-days-{{ $i }}-{{ $key }}"
                                type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                              <label
                                for="{{ $prefix }}-days-{{ $i }}-{{ $key }}"
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

            <div class="flex justify-end">
              <x-elements.button-gray wire:click="removeBlackoutTime({{ $i }})">
                Remove {{ $blackoutTime['label'] }}
              </x-elements.button-gray>
            </div>
          </div>
        @endforeach
      </div>

      <div class="pt-5">
        <div class="flex justify-end">
          <div>
            @if ($errors->count())
              <x-feedback.alert-failure message="Error!" />
            @elseif (session()->has('userFormMessage'))
              <x-feedback.alert-success :message="session('userFormMessage')" />
            @endif
          </div>
          <x-elements.button-gray x-data=""
            @click="$dispatch('toggle-{{ isset($this->user['id']) ? 'edit' : 'add' }}-overlay')">
            Close
          </x-elements.button-gray>
          <x-elements.button-gray wire:click="resetForm">Reset</x-elements.button-gray>
          <x-elements.button-indigo type="submit">Save</x-elements.button-indigo>
        </div>
      </div>
    </div>
  </div>
</form>
