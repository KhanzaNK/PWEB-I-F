<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
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
