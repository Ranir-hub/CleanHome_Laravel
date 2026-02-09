<?php

use app\Http\Controllers\OrderControllerApi;
use app\Http\Controllers\LoginController;
use app\Http\Controllers\ItemControllerApi;
use app\Http\Controllers\CategoryControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/category', [CategoryControllerApi::class, 'index']);
Route::get('/category/{id}', [CategoryControllerApi::class, 'show']);
Route::get('/item', [ItemControllerApi::class, 'index']);
Route::get('/item/{id}', [ItemControllerApi::class, 'show']);
Route::get('/order', [OrderControllerApi::class, 'index']);
Route::get('/order/{id}', [OrderControllerApi::class, 'show']);