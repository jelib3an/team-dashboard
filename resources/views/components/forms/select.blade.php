<select {{ $attributes->except(['defaultOptionText', 'options']) }}
  class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
  @if ($attributes->has('defaultOptionText'))
    <option>{{ $defaultOptionText }}</option>
  @endif
  @foreach ($options as $id => $text)
    <option value="{{ $id }}">{{ $text }}</option>
  @endforeach
</select>
