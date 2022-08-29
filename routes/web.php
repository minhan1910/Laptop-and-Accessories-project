<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\SettingAdminController;
use App\Http\Controllers\SliderAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/



// Route::get('/home', function () {
//     return view('home');
// });

// Route::prefix('admin')
//     ->name('admin.')
//     ->group(function () {

//         Route::get('/', [AdminController::class, 'loginAdmin']);

//         Route::post('/', [AdminController::class, 'postLoginAdmin']);

//         // Categories
//         Route::prefix('categories')
//             ->name('categories.')
//             ->group(function () {

//                 Route::get('/', [CategoryController::class, 'index'])
//                     ->name('index');

//                 Route::get('/create', [CategoryController::class, 'create'])
//                     ->name('create');

//                 Route::post('/store', [CategoryController::class, 'store'])
//                     ->name('store');

//                 Route::get('/edit/{id}', [CategoryController::class, 'edit'])
//                     ->name('edit');

//                 Route::post('/update/{id}', [CategoryController::class, 'update'])
//                     ->name('update');

//                 Route::get('/delete/{id}', [CategoryController::class, 'delete'])
//                     ->name('delete');
//             });

//         // Menus
//         Route::prefix('menus')
//             ->name('menus.')
//             ->group(function () {

//                 Route::get('/', [MenuController::class, 'index'])
//                     ->name('index');

//                 Route::get('/create', [MenuController::class, 'create'])
//                     ->name('create');

//                 Route::post('/store', [MenuController::class, 'store'])
//                     ->name('store');

//                 Route::get('/edit/{id}', [MenuController::class, 'edit'])
//                     ->name('edit');

//                 Route::post('/update/{id}', [MenuController::class, 'update'])
//                     ->name('update');

//                 Route::get('/delete/{id}', [MenuController::class, 'delete'])
//                     ->name('delete');
//             });

//         // Products
//         Route::prefix('products')
//             ->name('products.')
//             ->group(function () {

//                 Route::get('/', [AdminProductController::class, 'index'])
//                     ->name('index');

//                 Route::get('/create', [AdminProductController::class, 'create'])
//                     ->name('create');

//                 Route::post('/store', [AdminProductController::class, 'store'])
//                     ->name('store');

//                 Route::get('/edit/{id}', [AdminProductController::class, 'edit'])
//                     ->name('edit');

//                 Route::post('/update/{id}', [AdminProductController::class, 'update'])
//                     ->name('update');

//                 Route::get('/delete/{id}', [AdminProductController::class, 'delete'])
//                     ->name('delete');
//             });

//         // Sliders
//         Route::prefix('sliders')
//             ->name('sliders.')
//             ->group(function () {

//                 Route::get('/', [SliderAdminController::class, 'index'])
//                     ->name('index');

//                 Route::get('/create', [SliderAdminController::class, 'create'])
//                     ->name('create');

//                 Route::post('/store', [SliderAdminController::class, 'store'])
//                     ->name('store');

//                 Route::get('/edit/{id}', [SliderAdminController::class, 'edit'])
//                     ->name('edit');

//                 Route::post('/update/{id}', [SliderAdminController::class, 'update'])
//                     ->name('update');

//                 Route::get('/delete/{id}', [SliderAdminController::class, 'delete'])
//                     ->name('delete');
//             });

//         // Settings
//         Route::prefix('settings')
//             ->name('settings.')
//             ->group(function () {

//                 Route::get('/', [SettingAdminController::class, 'index'])
//                     ->name('index');

//                 Route::get('/create', [SettingAdminController::class, 'create'])
//                     ->name('create');

//                 Route::post('/store', [SettingAdminController::class, 'store'])
//                     ->name('store');

//                 Route::get('/edit/{id}', [SettingAdminController::class, 'edit'])
//                     ->name('edit');

//                 Route::post('/update/{id}', [SettingAdminController::class, 'update'])
//                     ->name('update');

//                 Route::get('/delete/{id}', [SettingAdminController::class, 'delete'])
//                     ->name('delete');
//             });
//     });