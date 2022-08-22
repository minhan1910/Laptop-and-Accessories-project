<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashBoardController;
use Illuminate\Support\Facades\Auth;

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/', [AdminController::class, 'loginAdmin']);
Route::post('/', [AdminController::class, 'postLoginAdmin']);
Route::get('dashboards', [AdminDashBoardController::class, 'index'])->name('dashboards.index');

include 'product.php';
include 'category.php';
include 'menu.php';
// include 'slider.php';
// include 'setting.php';
include 'role.php';
include 'user.php';
include 'permission.php';

include 'action.php';
include 'brand.php';