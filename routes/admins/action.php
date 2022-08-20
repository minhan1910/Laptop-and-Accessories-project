<?php

use App\Http\Controllers\AdminActionController;
use Illuminate\Support\Facades\Route;

Route::prefix('actions')
    ->name('actions.')
    ->group(function () {
        Route::get('/', [AdminActionController::class, 'index'])
            ->name('index')
            ->middleware('can:category-list');

        Route::get('/create', [AdminActionController::class, 'create'])
            ->name('create')
            ->middleware('can:category-add');

        Route::post('/store', [AdminActionController::class, 'store'])
            ->name('store')
            ->middleware('can:category-store');

        Route::get('/edit/{id}', [AdminActionController::class, 'edit'])
            ->name('edit')
            ->middleware('can:category-edit');

        Route::post('/update/{id}', [AdminActionController::class, 'update'])
            ->name('update')
            ->middleware('can:category-update');

        Route::get('/delete/{id}', [AdminActionController::class, 'delete'])
            ->name('delete')
            ->middleware('can:category-delete');
    });