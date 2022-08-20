<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', [AdminController::class, 'loginAdmin']);
Route::post('/', [AdminController::class, 'postLoginAdmin']);

include 'product.php';
include 'category.php';
include 'menu.php';
// include 'slider.php';
// include 'setting.php';
include 'role.php';
include 'user.php';
include 'permission.php';