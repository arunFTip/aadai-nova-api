<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantPolicy extends Model
{
    protected $fillable = [
        'tenant_id',
        'key',
        'value',
        'type',
        'is_enforced',
    ];

    protected $casts = [
        'value' => 'array',
        'is_enforced' => 'boolean',
    ];
}
