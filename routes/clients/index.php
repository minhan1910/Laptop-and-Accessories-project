<?php

use App\Http\Controllers\Client\ClientRegisterController;
use App\Http\Controllers\Client\ClientLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientRenderController;

Route::get('login', [ClientLoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [ClientLoginController::class, 'login'])
    ->name('post-login');

Route::post('logout', function () {
    Auth()->logout();
    return redirect()
        ->route('client.login');
})
    ->middleware('AuthClient')
    ->name('logout');

Route::get('registation', [ClientRegisterController::class, 'showRegistrationForm'])
    ->name('registation');
Route::post('registation', [ClientRegisterController::class, 'create'])
    ->name('registation');

Route::get('/', function () {
    return redirect('/client/home');
});

Route::prefix('/home')->name('home')->group(function () {
    Route::get('/', [ClientRenderController::class, 'index']);
});
Route::middleware(['AuthClient', 'PreventBackHistory'])->group(function () {
    Route::get('list/{id}', [ClientRenderController::class, 'getList'])->name('list');
    Route::get('detail/{id}', [ClientRenderController::class, 'getDetail'])->name('detail');
});