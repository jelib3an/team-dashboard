<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Interfaces\HasValidation;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use App\Timezones\Timezones;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller implements HasValidation
{
    public static function messages()
    {
        return [
            '*.required' => 'Field is required.',
            'blackoutTimes.*.*.required' => 'Field is required.',
            'blackoutTimes.*.days.min' => 'Recurring days must have at least :min items.',
        ];
    }

    public static function rules($id)
    {
        return  [
            'name' => [
                'required',
                'string',
                'min:1',
                Rule::unique('users', 'name')->ignore($id),
            ],
            'timezone' => [
                'required',
                Rule::in(Timezones::$all),
            ],
            'blackoutTimes.*.label' => 'required',
            'blackoutTimes.*.days' => 'array|min:1',
            'blackoutTimes.*.local_begin_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value)) {
                        $fail('Time must be in 24-hour format (eg. 13:00)');
                    }
                },
            ],
            'blackoutTimes.*.local_end_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value)) {
                        $fail('Time must be in 24-hour format (eg. 13:00)');
                    }
                },
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->only(['name', 'timezone']));
        $user->save();

        // TODO save blackout times

        return new ResourcesUser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
