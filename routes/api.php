<?php

use App\Http\Controllers\OrderControllerApi;
use App\Http\Controllers\AuthControllerApi;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemControllerApi;
use App\Http\Controllers\CategoryControllerApi;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class,'login']);


Route::group(['middlewaare' => ['auth:sanctum']], function(){
    Route::get('/order', [OrderControllerApi::class, 'index']);

    Route::get('/user', function (Request $request){
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);
Route::get('/item', [ItemControllerApi::class, 'index']);
Route::get('/item/{id}', [ItemControllerApi::class, 'show']);

// Route::get('/order', [OrderControllerApi::class, 'index']);
Route::get('/order/{id}', [OrderControllerApi::class, 'show']);