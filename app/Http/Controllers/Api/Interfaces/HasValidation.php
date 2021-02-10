<?php

namespace App\Http\Controllers\Api\Interfaces;

interface HasValidation
{
    public static function messages();

    public static function rules($id);
}
