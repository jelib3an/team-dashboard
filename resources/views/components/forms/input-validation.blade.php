 <div>
   <label for="{{ $name }}"
     class="block text-sm font-medium text-gray-700">{{ $label }}</label>
   <div class="mt-1 relative">
     <input {{ $attributes->wire('model') }} type="text" name="{{ $name }}"
       id="{{ $name }}" autocomplete="{{ $name }}"
       class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"
       placeholder="{{ $placeholder ?? '' }}" @error($name)aria-invalid="true" @enderror
       aria-describedby="{{ $name }}-error">
     <div class="absolute inset-y-0 right-0 pr-3 sm:pr-8 flex items-center pointer-events-none">
       @error($name)
         <!-- Heroicon name: solid/exclamation-circle -->
         <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
           fill="currentColor" aria-hidden="true">
           <path fill-rule="evenodd"
             d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
             clip-rule="evenodd" />
         </svg>
       @enderror
     </div>
   </div>
   <div>
     @error($name)
       <p class="mt-2 text-sm text-red-600" id="{{ $name }}-error">{{ $message }}</p>
     @enderror
   </div>
 </div>
