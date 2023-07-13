<?php

use App\Http\Controllers\Api\BranchController;

Route::get('/branches', [BranchController::class, 'index'])->name('index');

