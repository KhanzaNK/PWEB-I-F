<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\JualSampah;
use App\Models\JualProduk;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total berat sampah milik user
        $totalSampahKg = JualSampah::where('user_id', $userId)->sum('berat');

        // Total transaksi sampah milik user
        $totalTransaksi = JualSampah::where('user_id', $userId)->count();

        // Total pendapatan sampah milik user
        $pendapatanSampah = JualSampah::where('user_id', $userId)->sum('total_harga');

        // Total produk milik user
        $totalProduk = JualProduk::where('user_id', $userId)->count();

        // Riwayat penjualan terakhir milik user
        $riwayat = JualSampah::where('user_id', $userId)->latest()->limit(5)->get();

        return view('dashboard', compact(
            'totalSampahKg',
            'totalTransaksi',
            'pendapatanSampah',
            'totalProduk',
            'riwayat'


        ));
    }
}

