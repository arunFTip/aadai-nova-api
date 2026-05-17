<?php

namespace App\Common\UserPreferences\Controllers;

use App\Models\UserPreference;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Platform\Base\BaseController;

class UserPreferenceController extends BaseController
{
    public function index(Request $request): JsonResponse
    {
        return $this->successResponse([
            'preferences' => $request->user()
                ->preferences()
                ->get()
                ->keyBy('key')
                ->map(fn ($item) => $item->value),
        ], 'Preferences fetched successfully');
    }

    public function update(Request $request): JsonResponse
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:150'],
            'value' => ['nullable'],
            'type' => ['nullable', 'string'],
        ]);

        $preference = UserPreference::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'key' => $data['key'],
            ],
            [
                'value' => $data['value'],
                'type' => $data['type'] ?? 'json',
            ]
        );

        return $this->successResponse([
            'preference' => $preference,
        ], 'Preference saved successfully');
    }
}
