<div class="mr-2">
  <select wire:model="selectedUserId" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none
    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
    <option>Switch user</option>
    @foreach ($this->options as $option)
      <option value="{{ $option->id }}">{{ $option->name }}</option>
    @endforeach
  </select>
</div>
