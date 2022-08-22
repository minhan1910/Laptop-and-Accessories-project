<?php

// Users

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->name('users.')
    ->group(function () {

        Route::get('/', [AdminUserController::class, 'index'])
            ->name('index')
            ->middleware('can:user.list');

        Route::get('/create', [AdminUserController::class, 'create'])
            ->name('create')
            ->middleware('can:user.create');

        Route::post('/store', [AdminUserController::class, 'store'])
            ->name('store')
            ->middleware('can:user.create');

        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])
            ->name('edit')
            ->middleware('can:user.edit');

        Route::post('/update/{id}', [AdminUserController::class, 'update'])
            ->name('update')
            ->middleware('can:user.update');

        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])
            ->name('delete')
            ->middleware('can:user.delete');
    });