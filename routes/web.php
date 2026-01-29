<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class,'index']);
Route::get('/login', [NavigationController::class,'login'])->name('login');
Route::get('/signup', [NavigationController::class, 'signup'])->name('signup');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


Route::post('/buy/{id}', [ProductController::class, 'buy'])->name('buy');
Route::post('/register', Register::class) ->name('register');
Route::post('/logout', Logout::class)->name('logout')->middleware('auth');
Route::post('/login', Login::class)->middleware('guest');
Route::post('/cart/add', [OrderController::class, 'addToCart'])->name('cart.add');


Route::get('/dashboard', [NavigationController::class,'dashboard'])->middleware('auth')->name('dashboard');
