<?php

// Roles

use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminRoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('roles')
    ->name('roles.')
    ->group(function () {

        Route::get('/', [AdminRoleController::class, 'index'])
            ->name('index')
            ->middleware('can:role.list');

        Route::get('/create', [AdminRoleController::class, 'create'])
            ->name('create')
            ->middleware('can:role.create');


        Route::post('/store', [AdminRoleController::class, 'store'])
            ->name('store')
            ->middleware('can:role.create');


        Route::get('/edit/{role}', [AdminRoleController::class, 'edit'])
            ->name('edit')
            ->middleware('can:role.edit');


        Route::post('/update', [AdminRoleController::class, 'update'])
            ->name('update')
            ->middleware('can:role.update');


        Route::get('/delete/{role}', [AdminRoleController::class, 'delete'])
            ->name('delete')
            ->middleware('can:role.delete');


        Route::get('/permission/{role}', [AdminPermissionController::class, 'create'])
            ->name('permission')
            ->middleware('can:role.permission');


        Route::post('/permission/{role}', [AdminPermissionController::class, 'store'])
            ->middleware('can:role.permission');
    });