<?php

namespace App\Common\Settings\Services;

use App\Models\TenantSetting;

use App\Models\User;

class SettingsService
{
    public function get(
        string $key,
        mixed $default = null,
        ?User $user = null
    ): mixed {
        /**
         * Resolution order:
         *
         * 1. User preference
         * 2. Tenant policy
         * 3. Tenant setting
         * 4. System config/default
         */

        // TODO:
        // Resolve user preference

        // TODO:
        // Resolve tenant policy

        // TODO:
        // Resolve tenant setting

        return $this->getUserPreference($key, $user)
            ?? $this->getTenantPolicy($key, $user)
            ?? $this->getTenantSetting($key, $user)
            ?? $default;
    }

    protected function getUserPreference(
        string $key,
        ?User $user = null
    ): mixed {
        return null;
    }

    protected function getTenantPolicy(
        string $key,
        ?User $user = null
    ): mixed {
        return null;
    }

    protected function getTenantSetting(
        string $key,
        ?User $user = null
    ): mixed {
        $setting = TenantSetting::query()
            ->whereNull('tenant_id')
            ->where('key', $key)
            ->first();

        return $setting?->value;
    }
}
