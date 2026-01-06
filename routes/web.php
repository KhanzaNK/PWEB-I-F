<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return view('halaman_home');
});


// Routes untuk Form Penjualan
Route::middleware('auth')->prefix('jual')->group(function () {
    Route::get('/', [JualController::class, 'index'])->name('jual');
    Route::get('/form', [FormPenjualanController::class, 'index'])->name('jual.form');
    Route::post('/sampah', [FormPenjualanController::class, 'storeSampah'])->name('jual.sampah');
    Route::post('/produk', [FormPenjualanController::class, 'storeProduk'])->name('jual.produk');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard'); // Langsung memanggil view
})->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Menampilkan halaman form registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Memproses data yang dikirim dari form registrasi
Route::post('/register', [RegisterController::class, 'store']);
