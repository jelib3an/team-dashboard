<?php

namespace App\Http\Livewire\Traits;

trait SharesValidation
{
    public function messages()
    {
        return $this->getPrefixed('messages');
    }

    public function rules()
    {
        return $this->getPrefixed('rules');
    }

    private function getPrefixed($function)
    {
        $prefix = $this->prefix;

        $class = '\\App\\Http\\Controllers\\Api\\'.ucwords($prefix).'Controller';
        if (!class_exists($class)) {
            return [];
        }

        $messages = $class::$function($this->$prefix['id']);
        $newKeys = collect(array_keys($messages))->transform(function ($key) use ($prefix) {
            return "$prefix.$key";
        })->all();

        return array_combine($newKeys, array_values($messages));
    }
}
