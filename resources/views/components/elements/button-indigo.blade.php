<button {{ $attributes->merge(['type' => 'button']) }}
  class="ml-3 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outfocus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
  {{ $slot }}
</button>
