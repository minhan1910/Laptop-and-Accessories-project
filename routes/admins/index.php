<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\AdminLoginController;

Route::get('login', [AdminLoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [AdminLoginController::class, 'login'])
    ->name('post-login');

Route::post('logout', function () {
    Auth()->logout();
    return redirect()
        ->route('admin.login');
})
    ->middleware('AuthAdmin')
    ->name('logout');

Route::middleware(['AuthAdmin', 'PreventBackHistory'])
    ->group(function () {
        Route::get('/home', function () {
            return view('home');
        })->name('home');

        Route::get('dashboards', [AdminDashBoardController::class, 'index'])
            ->name('dashboards.index');

        include 'product.php';
        include 'category.php';
        include 'menu.php';
        include 'slider.php';
        include 'setting.php';
        include 'role.php';
        include 'user.php';
        include 'action.php';
        include 'brand.php';
    });