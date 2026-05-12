<?php

use Illuminate\Support\Facades\Route;
use App\Common\UserManagement\Controllers\UserListController;
use App\Common\UserManagement\Controllers\UserShowController;
use App\Common\UserManagement\Controllers\UserUpdateController;
use App\Common\UserManagement\Controllers\UserDeleteController;
require base_path('app/Common/ActivityLogs/Routes/api.php');

Route::middleware(['auth:sanctum', 'role:admin|super-admin'])
    ->prefix('users')
    ->group(function () {
        Route::get('/', UserListController::class);
        Route::get('/{user}', UserShowController::class);
        Route::put('/{user}', UserUpdateController::class);
        Route::delete('/{user}', UserDeleteController::class);
    });
