<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientRenderController;
Route::prefix('/home')->name('home')->group(function()
{
    Route::get('/',[ClientRenderController::class,'index']);
});

Route::get('list/{id}',[ClientRenderController::class,'getList'])->name('list');
Route::get('detail/{id}',[ClientRenderController::class,'getDetail'])->name('detail');
