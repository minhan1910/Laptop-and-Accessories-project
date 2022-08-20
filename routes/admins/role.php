<?php

// Roles

use App\Http\Controllers\AdminRoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('roles')
    ->name('roles.')
    ->group(function () {

        Route::get('/', [AdminRoleController::class, 'index'])
            ->name('index');

        Route::get('/create', [AdminRoleController::class, 'create'])
            ->name('create');

        Route::post('/store', [AdminRoleController::class, 'store'])
            ->name('store');

        Route::get('/edit/{role}', [AdminRoleController::class, 'edit'])
            ->name('edit');

        Route::post('/update', [AdminRoleController::class, 'update'])
            ->name('update');

        Route::get('/delete/{role}', [AdminRoleController::class, 'delete'])
            ->name('delete');
    });