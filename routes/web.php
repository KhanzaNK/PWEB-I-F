<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JualController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', fn() => view('halaman_home'))->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
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
Route::middleware('auth')->prefix('jual')->group(function () {
    Route::get('/', [JualController::class, 'index'])->name('jual');
    Route::get('/form', [FormPenjualanController::class, 'index'])->name('jual.form');
    Route::post('/sampah', [FormPenjualanController::class, 'storeSampah'])->name('jual.sampah');
    Route::post('/produk', [FormPenjualanController::class, 'storeProduk'])->name('jual.produk');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Menampilkan halaman form registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Memproses data yang dikirim dari form registrasi
Route::post('/register', [RegisterController::class, 'store']);
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

// HALAMAN TOKO
Route::get('/index', [ProductController::class, 'index'])
    ->name('products.index');

// KERANJANG (SESSION)
Route::prefix('cart')->group(function () {
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
    Route::get('/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});


Route::post('/cart/checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');
