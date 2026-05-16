<?php

namespace App\Common\Dashboard\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use Spatie\Permission\Models\Role;
use Spatie\Activitylog\Models\Activity;

class DashboardStatsController extends BaseController
{
    public function __invoke(): JsonResponse
    {
        return $this->successResponse([
            'total_users' => User::count(),

            'active_users' => User::where('status', 'active')->count(),

            'inactive_users' => User::where('status', 'inactive')->count(),

            'total_roles' => Role::count(),

            'recent_activities' => Activity::with('causer', 'subject')
    ->latest()
    ->take(5)
    ->get()
    ->map(function ($activity) {
        $properties = $activity->properties->toArray();

        $attributes = $properties['attributes'] ?? [];
        $old = $properties['old'] ?? [];

        $recordLabel =
            $activity->subject?->name
            ?? $activity->subject?->title
            ?? $activity->subject?->email
            ?? $attributes['name']
            ?? $attributes['title']
            ?? $attributes['email']
            ?? $old['name']
            ?? $old['title']
            ?? $old['email']
            ?? '#' . $activity->subject_id;

        return [
            'id' => $activity->id,
            'action' => $activity->description,
            'model' => class_basename($activity->subject_type),
            'record_label' => $recordLabel,
            'performed_by' => $activity->causer?->name ?? 'System',
            'created_at' => $activity->created_at->format('Y-m-d H:i:s'),
            'old' => $old,
            'new' => $attributes,
        ];
    }),
        ], 'Dashboard statistics fetched successfully');
    }
}
