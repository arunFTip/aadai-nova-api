<?php

namespace App\Common\ActivityLogs\Controllers;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\JsonResponse;
use App\Platform\Base\BaseController;
use App\Platform\Support\DateFilter;

class ActivityLogListController extends BaseController
{
    public function __invoke(): JsonResponse
    {

        $model = request('model');
        $action = request('action');
        $user = request('user');

        $dateFilter = request('date_filter');
        $from = request('from');
        $to = request('to');

        [$startDate, $endDate] = DateFilter::resolve($dateFilter, $from, $to);

        $logs = Activity::with('causer')
            ->when($model, function ($query) use ($model) {
                $query->where('subject_type', 'like', "%{$model}%");
            })
            ->when($action, function ($query) use ($action) {
                $query->where('description', $action);
            })
            ->when($user, function ($query) use ($user) {
                $query->whereHas('causer', function ($q) use ($user) {
                    $q->where('name', 'like', "%{$user}%");
                });
            })
            ->when($startDate, function ($query) use ($startDate) {
                $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->where('created_at', '<=', $endDate);
            })
            ->latest()
            ->paginate(request('per_page', 10));

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
                'from' => $logs->firstItem(),
                'to' => $logs->lastItem(),
            ],
        ], 'Activity logs fetched successfully');
    }
}
