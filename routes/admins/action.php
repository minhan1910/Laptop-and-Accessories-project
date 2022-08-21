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

        Route::get('/edit/{id}', [AdminActionController::class, 'edit'])
            ->name('edit');

        Route::post('/update/{id}', [AdminActionController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}', [AdminActionController::class, 'delete'])
            ->name('delete');
    });