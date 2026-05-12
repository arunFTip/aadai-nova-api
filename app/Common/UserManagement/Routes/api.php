<?php

use Illuminate\Support\Facades\Route;
use App\Common\UserManagement\Controllers\UserListController;

Route::middleware(['auth:sanctum', 'role:admin|super-admin'])
    ->prefix('users')
    ->group(function () {
        Route::get('/', UserListController::class);
    });
