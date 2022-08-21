<?php

use App\Http\Controllers\AdminActionController;
use Illuminate\Support\Facades\Route;

Route::prefix('actions')
    ->name('actions.')
    ->group(function () {
        Route::get('/', [AdminActionController::class, 'index'])
            ->name('index')
            ->middleware('can:action.list');

        Route::get('/select', [AdminActionController::class, 'selectPermisison'])
            ->name('select-permisison_name');

        Route::get('/create', [AdminActionController::class, 'create'])
            ->name('create')
            ->middleware('can:action.create');

        Route::post('/store', [AdminActionController::class, 'store'])
            ->name('store')
            ->middleware('can:action.create');

        Route::get('/edit/{action}', [AdminActionController::class, 'edit'])
            ->name('edit')
            ->middleware('can:action.edit');

        Route::post('/update', [AdminActionController::class, 'update'])
            ->name('update')
            ->middleware('can:action.update');

        Route::get('/delete/{action}', [AdminActionController::class, 'getDelete'])
            ->name('get-delete')
            ->middleware('can:action.delete');

        Route::post('/delete', [AdminActionController::class, 'delete'])
            ->name('delete')
            ->middleware('can:action.delete');
    });