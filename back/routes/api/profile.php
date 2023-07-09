<?php

use App\Http\Controllers\Api\ProfileAuthController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/profile')->name('api.profile.')->group(callback: function () {

    /** Получение данных о профиле пользоватлея */
    Route::get('/', [ProfileController::class, 'show'])
        ->middleware('auth:sanctum')
        ->name('show');

    /** Login */
    Route::post('/login', [ProfileAuthController::class, 'login'])
        ->middleware('guest')
        ->name('login');

    /** Logout */
    Route::post('/logout', [ProfileAuthController::class, 'logout'])
        ->middleware('auth:sanctum')
        ->name('logout');

    Route::post('/change-password', [ProfileAuthController::class, 'changePassword'])
        ->middleware('auth:sanctum')
        ->name('change-password');

});
