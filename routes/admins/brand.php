<?php

// Categories
use App\Http\Controllers\AdminBrandController;
use Illuminate\Support\Facades\Route;

Route::prefix('brands')
    ->name('brands.')
    ->group(function () {
        Route::get('/', [AdminBrandController::class, 'index'])
            ->name('index')
            ->middleware('can:brand.list');

        Route::get('/create', [AdminBrandController::class, 'create'])
            ->name('create')
            ->middleware('can:brand.create');

        Route::post('/store', [AdminBrandController::class, 'store'])
            ->name('store')
            ->middleware('can:brand.create');

        Route::get('/edit/{id}', [AdminBrandController::class, 'edit'])
            ->name('edit')
            ->middleware('can:brand.edit');

        Route::post('/update/{id}', [AdminBrandController::class, 'update'])
            ->name('update')
            ->middleware('can:brand.update');

        Route::get('/delete/{id}', [AdminBrandController::class, 'delete'])
            ->name('delete')
            ->middleware('can:brand.delete');
    });