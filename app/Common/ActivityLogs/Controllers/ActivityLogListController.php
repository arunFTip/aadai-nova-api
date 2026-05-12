<?php

namespace App\Common\ActivityLogs\Controllers;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;

class ActivityLogListController extends BaseController
{
    public function __invoke(): JsonResponse
{
    $logs = Activity::with('causer')
        ->latest()
        ->paginate(10);

    $formattedLogs = collect($logs->items())->map(function ($log) {
        return [
            'id' => $log->id,
            'action' => ucfirst($log->description),
            'model' => class_basename($log->subject_type),
            'record_id' => $log->subject_id,
            'user' => $log->causer?->name ?? 'System',
            'date' => $log->created_at->format('Y-m-d H:i:s'),
            'changes' => $log->properties,
        ];
    });

    return $this->successResponse([
        'logs' => $formattedLogs,
        'pagination' => [

            'current_page' => $logs->currentPage(),
            'last_page' => $logs->lastPage(),
            'per_page' => $logs->perPage(),
            'total' => $logs->total(),
        ],
    ], 'Activity logs fetched successfully');
}
}
