<?php

namespace App\Common\Settings\Controllers;

use App\Models\TenantSetting;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;

class TenantSettingController extends BaseController
{
    public function index(): JsonResponse
    {
        $settings = TenantSetting::query()
            ->whereNull('tenant_id')
            ->get()
            ->keyBy('key')
            ->map(fn ($setting) => $setting->value);

        return $this->successResponse([
            'settings' => $settings,
        ], 'Tenant settings fetched successfully');
    }

    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:150'],
            'value' => ['nullable'],
            'type' => ['nullable', 'string'],
        ]);

        $setting = TenantSetting::updateOrCreate(
            [
                'tenant_id' => null,
                'key' => $data['key'],
            ],
            [
                'value' => $data['value'],
                'type' => $data['type'] ?? 'json',
            ]
        );

        return $this->successResponse([
            'setting' => $setting,
        ], 'Tenant setting saved successfully');
    }
}
