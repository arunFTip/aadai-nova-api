<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'app' => 'Aadai Nova API',
    ]);
});


require base_path('app/Common/Authentication/Routes/api.php');
require base_path('app/Common/Authorization/Routes/api.php');
require base_path('app/Common/Admin/Routes/api.php');
require base_path('app/Common/UserManagement/Routes/api.php');
require app_path('Common/Dashboard/Routes/api.php');
require app_path('Common/UserPreferences/Routes/api.php');

