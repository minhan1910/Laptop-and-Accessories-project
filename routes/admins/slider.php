<?php

// Sliders

use App\Http\Controllers\SliderAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('sliders')
    ->name('sliders.')
    ->group(function () {

        Route::get('/', [SliderAdminController::class, 'index'])
            ->name('index');

        Route::get('/create', [SliderAdminController::class, 'create'])
            ->name('create');

        Route::post('/store', [SliderAdminController::class, 'store'])
            ->name('store');

        Route::get('/edit/{id}', [SliderAdminController::class, 'edit'])
            ->name('edit');

        Route::post('/update/{id}', [SliderAdminController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}', [SliderAdminController::class, 'delete'])
            ->name('delete');
    });