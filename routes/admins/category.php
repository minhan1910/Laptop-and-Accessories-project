<?php

// Categories
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')
    ->name('categories.')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('index')
            ->middleware('can:category.list');

        Route::get('/create', [CategoryController::class, 'create'])
            ->name('create')
            ->middleware('can:category.create');

        Route::post('/store', [CategoryController::class, 'store'])
            ->name('store')
            ->middleware('can:category.create');

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])
            ->name('edit')
            ->middleware('can:category.edit');

        Route::post('/update/{id}', [CategoryController::class, 'update'])
            ->name('update')
            ->middleware('can:category.update');

        Route::get('/delete/{id}', [CategoryController::class, 'delete'])
            ->name('delete')
            ->middleware('can:category.delete');
    });

