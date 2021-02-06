<div class="container m-auto my-2">
  <h3 class="text-lg leading-6 font-medium text-gray-900">
    {{$team->name}}
  </h3>
  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    @foreach ($team->users->sortByDesc('utc_offset_minutes')->all() as $user)
      @livewire('show-user-tile', ['user' => $user], key($user->id))
    @endforeach
  </dl>
</div>
