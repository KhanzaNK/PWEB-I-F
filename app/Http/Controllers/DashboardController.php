<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\JualSampah;
use App\Models\JualProduk;

class DashboardController extends Controller
{
    public function index()
    {
        // Total berat sampah
        $totalSampahKg = JualSampah::sum('berat');

        // Total transaksi sampah
        $totalTransaksi = JualSampah::count();

        // Total pendapatan sampah
        $pendapatanSampah = JualSampah::sum('total_harga');

        // Total produk
        $totalProduk = JualProduk::count();

        // Riwayat penjualan terakhir
        $riwayat = JualSampah::latest()->limit(5)->get();

         dd($riwayat);

        return view('dashboard', compact(
            'totalSampahKg',
            'totalTransaksi',
            'pendapatanSampah',
            'totalProduk',
            'riwayat'


        ));
    }
}

