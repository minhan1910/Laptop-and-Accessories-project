<?php

// Permissions

use App\Http\Controllers\AdminPermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('permissions')
    ->name('permissions.')
    ->group(function () {

        Route::get('/create', [AdminPermissionController::class, 'create'])
            ->name('create');

        Route::post('/store', [AdminPermissionController::class, 'store'])
            ->name('store');
    });