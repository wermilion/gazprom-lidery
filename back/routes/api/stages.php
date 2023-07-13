<?php

use App\Http\Controllers\Api\ProfileAuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('/stages')->name('api.stages.')->group(callback: function () {

    Route::get('/', [StageController::class, 'index'])->name('index');

    Route::get('/{stage}', [StageController::class, 'show'])->name('show');

    Route::post('/form', [StageController::class, 'form'])->name('form');

    Route::post('/managementDecision', [StageController::class, 'managementDecision'])->name('managementDecision');

    Route::post('/challenge', [StageController::class, 'challenge'])->name('challenge');
    
});
