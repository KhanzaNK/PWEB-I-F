<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPenjualanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// ================= HOME & DASHBOARD =================
Route::get('/', fn() => view('halaman_home'))->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// ================= PENJUALAN =================
Route::middleware('auth')->prefix('jual')->group(function () {
    Route::get('/', [JualController::class, 'index'])->name('jual');
    Route::get('/form', [FormPenjualanController::class, 'index'])->name('jual.form');
    Route::post('/sampah', [FormPenjualanController::class, 'storeSampah'])->name('jual.sampah');
    Route::post('/produk', [FormPenjualanController::class, 'storeProduk'])->name('jual.produk');
});

// ================= AUTH =================
// Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ================= TOKO =================
Route::get('/toko', [ProductController::class, 'index'])->name('products.index');

// ================= KERANJANG (SESSION) =================
Route::prefix('cart')->group(function () {
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
    Route::get('/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});
