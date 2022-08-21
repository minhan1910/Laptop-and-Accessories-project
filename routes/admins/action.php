<?php

use App\Http\Controllers\AdminActionController;
use Illuminate\Support\Facades\Route;

Route::prefix('actions')
    ->name('actions.')
    ->group(function () {
        Route::get('/', [AdminActionController::class, 'index'])
            ->name('index');

        Route::get('/select', [AdminActionController::class, 'selectPermisison'])
            ->name('select-permisison_name');

        Route::get('/create', [AdminActionController::class, 'create'])
            ->name('create');

        Route::post('/store', [AdminActionController::class, 'store'])
            ->name('store');

        Route::get('/edit/{action}', [AdminActionController::class, 'edit'])
            ->name('edit');

        Route::post('/update', [AdminActionController::class, 'update'])
            ->name('update');

        Route::get('/delete/{action}', [AdminActionController::class, 'getDelete'])
            ->name('get-delete');

        Route::post('/delete', [AdminActionController::class, 'delete'])
            ->name('delete');
    });