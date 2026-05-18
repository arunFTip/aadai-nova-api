<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TenantPolicy;

class TenantPolicySeeder extends Seeder
{
    public function run(): void
    {
        $policies = [
            'security.allow_mobile_login' => true,
            'security.allow_outside_office_login' => true,
            'security.session_timeout' => 120,
            'security.allowed_ip_ranges' => '',
        ];

        foreach ($policies as $key => $value) {
            TenantPolicy::updateOrCreate(
                [
                    'tenant_id' => null,
                    'key' => $key,
                ],
                [
                    'value' => $value,
                    'type' => gettype($value),
                    'is_enforced' => true,
                ]
            );
        }
    }
}
