<?php

use Illuminate\Support\Facades\Route;
use App\Common\UserPreferences\Controllers\UserPreferenceController;

Route::middleware(['auth:sanctum'])
    ->prefix('user-preferences')
    ->group(function () {
        Route::get('/', [UserPreferenceController::class, 'index']);
        Route::post('/', [UserPreferenceController::class, 'update']);
    });
