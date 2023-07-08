<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DistanceController;
use App\Http\Controllers\FormStageController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\RegistrationStageController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/** Административная панель */

Route::name('cp.')->prefix('cp/')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('main', [AdminController::class, 'index'])->name('index');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::name('instruments.')->prefix('instruments/')->group(function () {

            Route::get('', [InstrumentController::class, 'index'])->name('index');

            Route::get('edit/{instrument}', [InstrumentController::class, 'edit'])->name('edit');
            Route::put('update/{instrument}', [InstrumentController::class, 'update'])->name('update');

        });

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

        Route::name('results.')->prefix('results/')->group(function () {

            Route::get('', [ResultController::class, 'index'])->name('index');

            Route::get('/{stage:slug}', [ResultController::class, 'show'])->name('show');

            Route::post('accept/{result}', [ResultController::class, 'accept'])->name('accept');

            Route::post('reject/{result}', [ResultController::class, 'reject'])->name('reject');

            Route::post('onCheck/{result}', [ResultController::class, 'onCheck'])->name('onCheck');

            Route::post('storeDistance/{result}', [ResultController::class, 'storeDistance'])->name('storeDistance');

            Route::get('/{stage:slug}/{result}', [ResultController::class, 'printPdf'])->name('printPdf');

        });
    });
});
