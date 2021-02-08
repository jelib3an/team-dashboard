<x-layout>
  <div class="container m-auto my-2">
    @livewire('show-header', ['user' => request()->user(), 'team' => $team])
    <div class="mt-4 flex flex-row">
      @if (count($team->users))
        <div class="px-2 w-full">
          @livewire('slider', ['max' => 60 * 24 * 4, 'step' => 20])
        </div>
      @endif
    </div>
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($team->users->sortByDesc('utc_offset_minutes')->all() as $user)
        @livewire('show-user-tile', ['user' => $user], key($user->id))
      @endforeach
    </dl>
  </div>
</x-layout>
