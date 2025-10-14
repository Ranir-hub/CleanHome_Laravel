<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return view('hello', ['title' => 'Hello world']);
});

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/item', [ItemController::class, 'index']);
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/item/create', [ItemController::class, 'create']);
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/edit/{id}', [ItemController::class, 'edit']);
Route::post('/item/update/{id}', [ItemController::class, 'update']);
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy']);