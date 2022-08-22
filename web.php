<?php

use Illuminate\Support\Facades\Route;

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
//Slider
Route::get('home-slider','Admin\SliderController@index');
Route::get('add-slider','Admin\SliderController@create');
Route::post('store-slider','Admin\SliderController@store');
Route::get('edit-slider/{id}','Admin\SliderController@edit');
Route::put('update-slider/{id}','Admin\SliderController@update');


Route::get('/', function () {
    return view('welcome');
});
