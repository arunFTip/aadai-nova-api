<?php

use Illuminate\Support\Facades\Route;
use App\Common\Dashboard\Controllers\DashboardStatsController;

Route::middleware([
    'auth:sanctum',
])->group(function () {
    Route::get('/dashboard/stats', DashboardStatsController::class);
});
