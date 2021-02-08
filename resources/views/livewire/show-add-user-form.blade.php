<form class="space-y-8 divide-y divide-gray-200">
  <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
    <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
      <div class="space-y-6 sm:space-y-5">
        <div
          class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Name
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <input type="text" name="name" id="name" autocomplete="given-name" placeholder="John"
              class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
          </div>
        </div>

        <div
          class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
          <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            Timezone
          </label>
          <div class="mt-1 sm:mt-0 sm:col-span-2">
            <select id="timezone" name="timezone" autocomplete="timezone"
              class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
              @foreach (\App\Timezones\Timezones::$all as $timezone)
                <option>{{ $timezone }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
        <div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Unavailabilities
          </h3>
        </div>
        <div class="space-y-6 sm:space-y-5">
          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="activity"
              class="mt-4 block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
              Activity
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
              <input type="text" name="activity" id="activity" autocomplete="activity"
                placeholder="eg. Meeting, Sleeping"
                class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
            </div>
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
                  </div>
                  <div class="mt-4 grid grid-cols-3">
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
                            <input id="comments" name="comments" type="checkbox"
                              class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="comments"
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
      </div>

      <div class="pt-5">
        <div class="flex justify-end">
          <button type="button"
            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
          </button>
          <button type="submit"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
