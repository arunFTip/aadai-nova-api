<?php

use Illuminate\Support\Facades\Route;
use App\Common\ActivityLogs\Controllers\ActivityLogListController;

Route::middleware(['auth:sanctum', 'permission:activity-log.view'])
    ->prefix('activity-logs')
    ->group(function () {
        Route::get('/', ActivityLogListController::class);
    });
