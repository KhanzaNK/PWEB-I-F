<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPenjualanController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Form Penjualan
Route::prefix('jual')->group(function () {
    Route::get('/form', [FormPenjualanController::class, 'index'])->name('jual.form');
    Route::post('/sampah', [FormPenjualanController::class, 'storeSampah'])->name('jual.sampah');
    Route::post('/produk', [FormPenjualanController::class, 'storeProduk'])->name('jual.produk');
});
