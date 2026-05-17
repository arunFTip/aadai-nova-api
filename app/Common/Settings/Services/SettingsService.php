<?php

namespace App\Common\Settings\Services;

use App\Models\User;

class SettingsService
{
    public function get(
        string $key,
        mixed $default = null,
        ?User $user = null
    ): mixed {
        // TODO:
        // 1. User preference
        // 2. Tenant setting/policy
        // 3. System config
        // 4. Default fallback

        return $default;
    }
}
