<?php

use Illuminate\Support\Facades\Route;
use App\Common\Settings\Controllers\TenantSettingController;
use App\Common\Settings\Controllers\TenantPolicyController;

Route::middleware([
    'auth:sanctum',
    'permission:settings.localization.manage',
])
    ->prefix('settings/tenant')
    ->group(function () {
        Route::get('/', [TenantSettingController::class, 'index']);
        Route::post('/', [TenantSettingController::class, 'update']);
    });

Route::middleware([
    'auth:sanctum',
    'permission:settings.security.manage',
])
    ->prefix('settings/policies')
    ->group(function () {
        Route::get('/', [TenantPolicyController::class, 'index']);
        Route::post('/', [TenantPolicyController::class, 'update']);
    });
