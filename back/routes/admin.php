<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;

/** Административная панель */

Route::name('cp.')->prefix('cp/')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('', [AdminController::class, 'index'])->name('index');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::name('users.')->prefix('users/')->group(function () {

            Route::get('', [UserController::class, 'index'])->name('index');

            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');

            Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');

            Route::get('printPdf', [UserController::class, 'printPdf'])->name('printPdf');
        });

        Route::name('branches.')->prefix('branches/')->group(function () {

            Route::get('', [BranchController::class, 'index'])->name('index');

            Route::get('create', [BranchController::class, 'create'])->name('create');
            Route::post('store', [BranchController::class, 'store'])->name('store');

            Route::get('edit/{branch}', [BranchController::class, 'edit'])->name('edit');
            Route::put('update/{branch}', [BranchController::class, 'update'])->name('update');

            Route::delete('destroy/{branch}', [BranchController::class, 'destroy'])->name('destroy');
        });

        Route::name('stages.')->prefix('stages/')->group(function () {

            Route::get('', [StageController::class, 'index'])->name('index');

            Route::get('edit/{stage}', [StageController::class, 'edit'])->name('edit');
            Route::put('update/{stage}', [StageController::class, 'update'])->name('update');
        });
    });
});
