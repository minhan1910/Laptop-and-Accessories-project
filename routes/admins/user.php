<?php

// Users

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->name('users.')
    ->group(function () {

        Route::get('/', [AdminUserController::class, 'index'])
            ->name('index');

        Route::get('/create', [AdminUserController::class, 'create'])
            ->name('create');

        Route::post('/store', [AdminUserController::class, 'store'])
            ->name('store');

        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])
            ->name('edit');

        Route::post('/update/{id}', [AdminUserController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])
            ->name('delete');
    });