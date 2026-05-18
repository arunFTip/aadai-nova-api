<?php

namespace App\Common\Settings\Controllers;

use App\Models\TenantPolicy;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;

class TenantPolicyController extends BaseController
{
    public function index(): JsonResponse
    {
        $policies = TenantPolicy::query()
            ->whereNull('tenant_id')
            ->get()
            ->keyBy('key')
            ->map(fn ($policy) => $policy->value);

        return $this->successResponse([
            'policies' => $policies,
        ], 'Tenant policies fetched successfully');
    }

    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:150'],
            'value' => ['nullable'],
            'type' => ['nullable', 'string'],
            'is_enforced' => ['nullable', 'boolean'],
        ]);

        $policy = TenantPolicy::updateOrCreate(
            [
                'tenant_id' => null,
                'key' => $data['key'],
            ],
            [
                'value' => $data['value'],
                'type' => $data['type'] ?? 'json',
                'is_enforced' => $data['is_enforced'] ?? true,
            ]
        );

        return $this->successResponse([
            'policy' => $policy,
        ], 'Tenant policy saved successfully');
    }
}
