<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\AuthController;

Route::group(['middleware' => ['cors', 'force_json', 'localization']], function () {
    Route::group(
        [
            'prefix' => 'auth'
        ],
        function () {
            Route::post('login', [AuthController::class, 'login']);
        }
    );

    Route::apiResource('role', RoleController::class);
    Route::apiResource('user', UserController::class);
});
