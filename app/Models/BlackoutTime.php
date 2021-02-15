<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackoutTime extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['label', 'local_begin_time', 'local_end_time', 'days'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'days' => 'array',
    ];
}
