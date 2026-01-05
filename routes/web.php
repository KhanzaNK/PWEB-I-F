<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('halaman_home');
});

Route::get('/jual', function () {
    $jenisSampah = collect([
        (object)[ 'jenis_sampah' => 'Plastik', 'harga_per_kg' => 3000, 'icon' => 'fas fa-recycle' ],
        (object)[ 'jenis_sampah' => 'Kertas', 'harga_per_kg' => 2500, 'icon' => 'fas fa-file-alt' ],
        (object)[ 'jenis_sampah' => 'Logam',  'harga_per_kg' => 8000, 'icon' => 'fas fa-cogs' ],
        (object)[ 'jenis_sampah' => 'Kaca',   'harga_per_kg' => 4000, 'icon' => 'fas fa-wine-glass-alt' ],
        (object)[ 'jenis_sampah' => 'Organik', 'harga_per_kg' => 1000, 'icon' => 'fas fa-seedling' ],
    ]);

    return view('jual', compact('jenisSampah'));
});


// Routes untuk Form Penjualan
Route::prefix('jual')->group(function () {
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
