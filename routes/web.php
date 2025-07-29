<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('auth.register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/resources', [App\Http\Controllers\HomeController::class, 'resources'])->name('resources');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::get('/pay', [App\Http\Controllers\HomeController::class, 'pay'])->name('pay');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin-panel', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

Auth::routes();
