<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:admin|super-admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', function () {
            return response()->json([
                'success' => true,
                'message' => 'Admin dashboard working',
            ]);
        });
    });
