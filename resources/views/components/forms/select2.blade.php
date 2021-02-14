{{-- requires jquery + select2 --}}
{{-- styles are in resources/css/app.css --}}
<div wire:ignore
  x-data="{ selected: $wire.entangle('{{ $attributes->wire('model')->value() }}') }" x-init="() => {
    select2 = $($refs.select2).select2();
    select2.on('select2:select', (e) => selected = e.target.value);
    $watch('selected', (value) => select2.val(value).trigger('change'));
}">
  <x-forms.select x-ref="select2" x-model="selected" :options="$options" style="width:100%" />
</div>
