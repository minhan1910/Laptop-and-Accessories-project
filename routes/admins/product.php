<?php

// Products

use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')
    ->name('products.')
    ->group(function () {

        Route::get('/', [AdminProductController::class, 'index'])
            ->name('index')
            ->middleware('can:product.list');

        Route::get('/create', [AdminProductController::class, 'create'])
            ->name('create')
            ->middleware('can:product.create');

        Route::post('/store', [AdminProductController::class, 'store'])
            ->name('store')
            ->middleware('can:product.create');

        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])
            ->name('edit')
            ->middleware('can:product.edit');

        Route::post('/update/{id}', [AdminProductController::class, 'update'])
            ->name('update')
            ->middleware('can:product.update');

        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])
            ->name('delete')
            ->middleware('can:product.delete');
    });