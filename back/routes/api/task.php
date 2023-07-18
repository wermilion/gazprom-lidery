<?php

use App\Http\Controllers\Api\ProfileAuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/task', [TaskController::class, 'index'])->name('index');

