<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Get the user's utc offset in minutes.
     *
     * @return integer
     */
    public function getUtcOffsetMinutesAttribute()
    {
        return Carbon::createFromTimestamp(0, $this->timezone)->offsetMinutes;
    }

    /**
     * Get the blackout times for the user.
     */
    public function blackoutTimes()
    {
        return $this->hasMany(BlackoutTime::class);
    }
}
