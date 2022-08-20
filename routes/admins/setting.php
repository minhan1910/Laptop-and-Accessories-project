<?php

// Settings

use App\Http\Controllers\SettingAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('settings')
    ->name('settings.')
    ->group(function () {

        Route::get('/', [SettingAdminController::class, 'index'])
            ->name('index');

        Route::get('/create', [SettingAdminController::class, 'create'])
            ->name('create');

        Route::post('/store', [SettingAdminController::class, 'store'])
            ->name('store');

        Route::get('/edit/{id}', [SettingAdminController::class, 'edit'])
            ->name('edit');

        Route::post('/update/{id}', [SettingAdminController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}', [SettingAdminController::class, 'delete'])
            ->name('delete');
    });