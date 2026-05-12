<?php

use Illuminate\Support\Facades\Route;
use App\Common\Authorization\Controllers\PermissionCheckController;

Route::middleware('auth:sanctum')->prefix('permissions')->group(function () {
    Route::get('/check', PermissionCheckController::class);
});
