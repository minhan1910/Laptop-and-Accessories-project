<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashBoardController;
use Illuminate\Support\Facades\Auth;


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [AdminController::class, 'loginAdmin'])
    ->name('login');
Route::post('/login', [AdminController::class, 'postLoginAdmin']);
Route::get('dashboards', [AdminDashBoardController::class, 'index'])->name('dashboards.index');

Route::get('logout', function () {
    Auth::logout();
    return redirect()
        ->route('admin.login');
})->name('logout');

include 'product.php';
include 'category.php';
include 'menu.php';
// include 'slider.php';
// include 'setting.php';
include 'role.php';
include 'user.php';
include 'permission.php';
include 'action.php';