<?php

// Menus

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('menus')
    ->name('menus.')
    ->group(function () {

        Route::get('/', [MenuController::class, 'index'])
            ->name('index')
            ->middleware('can:menu-list');

        Route::get('/create', [MenuController::class, 'create'])
            ->name('create')
            ->middleware('can:menu-add');

        Route::post('/store', [MenuController::class, 'store'])
            ->name('store')
            ->middleware('can:menu-store');

        Route::get('/edit/{id}', [MenuController::class, 'edit'])
            ->name('edit')
            ->middleware('can:menu-edit');

        Route::post('/update/{id}', [MenuController::class, 'update'])
            ->name('update')
            ->middleware('can:menu-update');

        Route::get('/delete/{id}', [MenuController::class, 'delete'])
            ->name('delete')
            ->middleware('can:menu-delete');
    });