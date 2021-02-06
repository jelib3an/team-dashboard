<div class="container m-auto my-2">
  <div class="flex flex-row">
    @if (count($team->users))
      <div class="px-2 w-full">
        <input
          oninput="Livewire.emit('sliderChanged', this.value)"
          type="range" class="w-full" min="0"
          max="5760" step="20" value="0" />
      </div>
    @endif
  </div>
  <dl
    class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($team->users->sortByDesc('utc_offset_minutes')->all() as $user)
      @livewire('show-user-tile', ['user' =>
      $user], key($user->id))
    @endforeach
  </dl>
</div>
