<?php

use App\Http\Controllers\Api\ProfileAuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('/stages')->name('api.stages.')->group(callback: function () {

    Route::get('/', [StageController::class, 'index'])->name('index');

    Route::get('/{stage}', [StageController::class, 'show'])->name('show');

});
