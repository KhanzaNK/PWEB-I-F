<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\JualSampah;
use App\Models\JualProduk;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalSampahKg = JualSampah::where('user_id', $userId)->sum('berat');
        $totalTransaksi = JualSampah::where('user_id', $userId)->count();
        $pendapatanSampah = JualSampah::where('user_id', $userId)->sum('total_harga');
        $totalproduk = JualProduk::where('user_id', $userId)->count();
        $totaljual = JualProduk::where('user_id', $userId)->sum('stok');
        $pendapatanProduk = JualProduk::where('user_id', $userId)
            ->selectRaw('SUM(harga * stok) as total')->value('total') ?? 0;
        $riwayat = JualSampah::where('user_id', $userId)->latest()->limit(5)->get();
        $riwayatproduk = JualProduk::where('user_id', $userId)->latest()->limit(5)->get();

        return view('dashboard', compact(
            'totalSampahKg',
            'totalTransaksi',
            'pendapatanSampah',
            'totaljual',
            'totalproduk',
            'pendapatanProduk',
            'riwayat',
            'riwayatproduk'
        ));
    }
}

