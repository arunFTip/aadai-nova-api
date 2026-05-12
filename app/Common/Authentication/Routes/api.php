<?php

use Illuminate\Support\Facades\Route;
use App\Common\Authentication\Controllers\AuthCheckController;
use App\Common\Authentication\Controllers\RegisterController;
use App\Common\Authentication\Controllers\LoginController;
use App\Common\Authentication\Controllers\MeController;
use App\Common\Authentication\Controllers\LogoutController;
use App\Common\Authorization\Controllers\RoleListController;

Route::prefix('auth')->group(function () {
    Route::get('/check', AuthCheckController::class);
    Route::post('/register', RegisterController::class);
    Route::post('/login', LoginController::class);
    Route::middleware('auth:sanctum')->get('/me', MeController::class);
    Route::middleware('auth:sanctum')->post('/logout', LogoutController::class);

});
