<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/create', [ItemController::class, 'create'])->middleware('auth');
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->middleware('auth');
Route::post('/item/update/{id}', [ItemController::class, 'update'])->middleware('auth');
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->middleware('auth');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get('/error', function() {
    return view('error', ['message' => session('message')]);
});