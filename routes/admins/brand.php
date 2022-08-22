<?php

// Categories
use App\Http\Controllers\AdminBrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brands')
    ->name('brands.')
    ->group(function () {
        Route::get('/', [AdminBrandController::class, 'index'])
            ->name('index');

        Route::get('/create', [AdminBrandController::class, 'create'])
            ->name('create');

        Route::post('/store', [AdminBrandController::class, 'store'])
            ->name('store');

        Route::get('/edit/{id}', [AdminBrandController::class, 'edit'])
            ->name('edit');

        Route::post('/update/{id}', [AdminBrandController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}', [AdminBrandController::class, 'delete'])
            ->name('delete');
    });

