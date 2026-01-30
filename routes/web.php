<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


use Carbon\CarbonTimeZone;
use Illuminate\Support\Facades\Route;

Route::get('/', [NavigationController::class,'index']);
Route::get('/login', [NavigationController::class,'login'])->name('login');
Route::get('/signup', [NavigationController::class, 'signup'])->name('signup');
Route::get('/orders', [CartController::class, 'orders'])->name('orders.index');


Route::post('/buy/{id}', [ProductController::class, 'buy'])->name('buy');
Route::post('/register', Register::class) ->name('register');
Route::post('/logout', Logout::class)->name('logout')->middleware('auth');
Route::post('/login', Login::class)->middleware('guest');
// Route::post('/cart/add', [CarbonTimeZone::class, 'addToCart'])->name('cart.add');


Route::get('/dashboard', [NavigationController::class,'dashboard'])->middleware('auth')->name('dashboard');

// Route::put('/orders/{order}', action: [OrderController::class, 'update'])->name('orders.update');
// Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Route::post('/cart/increase/{id}', [CartController::class, 'increase_item'])->name('cart.increase');
// Route::post('/cart/decrease/{id}', [CartController::class, 'decrease_item'])->name('cart.decrease');
// Route::post('/cart/remove/{id}', [CartController::class, 'remove_item'])->name('cart.remove');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/reduce/{id}', [CartController::class, 'reduce_item'])->name('cart.reduce');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/orders/{id}', [CartController::class, 'decrease'])->name('orders.decrease');