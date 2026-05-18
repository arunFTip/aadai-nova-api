<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TenantSetting;


class TenantSettingSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TenantSettingSeeder::class,
        ]);
        $settings = [
            'format.timezone' => 'Asia/Kolkata',
            'format.currency' => 'INR',
            'format.currency_locale' => 'en-IN',
            'format.number_locale' => 'en-IN',
            'format.date_format' => 'DD/MM/YYYY',
            'format.time_format' => '12h',
        ];

        foreach ($settings as $key => $value) {
            TenantSetting::updateOrCreate(
                [
                    'tenant_id' => null,
                    'key' => $key,
                ],
                [
                    'value' => $value,
                    'type' => 'string',
                ]
            );
        }
    }
}
