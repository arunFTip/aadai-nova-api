<?php

use Illuminate\Support\Facades\Route;
use App\Common\Authorization\Controllers\PermissionCheckController;
use App\Common\Authorization\Controllers\PermissionListController;
use App\Common\Authorization\Controllers\RoleListController;
use App\Common\Authorization\Controllers\RoleCreateController;
use App\Common\Authorization\Controllers\RoleShowController;
use App\Common\Authorization\Controllers\RoleUpdateController;
use App\Common\Authorization\Controllers\RoleDeleteController;

Route::middleware('auth:sanctum')->prefix('permissions')->group(function () {
    Route::get('/check', PermissionCheckController::class);
});
Route::middleware(['auth:sanctum', 'permission:admin.view'])
    ->prefix('permissions')
    ->group(function () {
        Route::get('/', PermissionListController::class);
    });
Route::post('/', RoleCreateController::class);


Route::middleware(['auth:sanctum', 'permission:admin.view'])
    ->prefix('roles')
    ->group(function () {
        Route::get('/', RoleListController::class);
        Route::post('/', RoleCreateController::class);
        Route::get('/{role}', RoleShowController::class);
        Route::put('/{role}', RoleUpdateController::class);
        Route::delete('/{role}', RoleDeleteController::class);
    });
