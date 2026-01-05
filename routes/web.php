<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPenjualanController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('halaman_home');
});

Route::get('/jual', function () {
    return view('jual');
});



Route::prefix('jual')->group(function () {
    Route::get('/form', [FormPenjualanController::class, 'index'])->name('jual.form');
    Route::post('/sampah', [FormPenjualanController::class, 'storeSampah'])->name('jual.sampah');
    Route::post('/produk', [FormPenjualanController::class, 'storeProduk'])->name('jual.produk');
});
Route::get('/', [ProductController::class, 'index']);
Route::get('/cart/add/{id}', [ProductController::class, 'add'])->name('cart.add');
Route::get('/cart/increase/{id}', [ProductController::class, 'increase'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [ProductController::class, 'decrease'])->name('cart.decrease');
Route::get('/cart/remove/{id}', [ProductController::class, 'remove'])->name('cart.remove');
