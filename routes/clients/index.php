<?php

use App\Http\Controllers\Client\ClientLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientRenderController;

Route::get('login', [ClientLoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [ClientLoginController::class, 'login'])
    ->name('post-login');

Route::get('logout', function () {
    Auth()->logout();
    return redirect()
        ->route('client.login');
})
    ->middleware('AuthClient')
    ->name('logout');

Route::middleware(['AuthClient', 'PreventBackHistory'])->group(function () {
    Route::prefix('/home')->name('home')->group(function () {
        Route::get('/', [ClientRenderController::class, 'index']);
    });
    Route::get('list/{id}', [ClientRenderController::class, 'getList'])->name('list');
    Route::get('detail/{id}', [ClientRenderController::class, 'getDetail'])->name('detail');
});