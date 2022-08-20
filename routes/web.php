<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminProductController;
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

//         // Handle users
//         Route::prefix('users')->name('users.')->group(function () {
//             Route::get('/', [AdminUserController::class, 'index'])
//                 ->name('index');

//             Route::get('/create', [AdminUserController::class, 'create'])
//                 ->name('create');

//             Route::post('/store', [AdminUserController::class, 'store'])
//                 ->name('store');

//             Route::get('/edit/{id}', [AdminUserController::class, 'edit'])
//                 ->name('edit');

//             Route::post('/update/{id}', [AdminUserController::class, 'update'])
//                 ->name('update');

//             Route::get('/delete/{id}', [AdminUserController::class, 'delete'])
//                 ->name('delete');
//         });
//         // End handle users
//     });





// Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');