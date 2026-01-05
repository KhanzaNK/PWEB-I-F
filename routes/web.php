<?php

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/cart/add/{id}', [ProductController::class, 'add'])->name('cart.add');
Route::get('/cart/increase/{id}', [ProductController::class, 'increase'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [ProductController::class, 'decrease'])->name('cart.decrease');
Route::get('/cart/remove/{id}', [ProductController::class, 'remove'])->name('cart.remove');
