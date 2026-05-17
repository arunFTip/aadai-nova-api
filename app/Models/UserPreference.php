<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $fillable = [
        'user_id',
        'key',
        'value',
        'type',
        'is_locked',
    ];

    protected $casts = [
        'value' => 'array',
        'is_locked' => 'boolean',
    ];
}
