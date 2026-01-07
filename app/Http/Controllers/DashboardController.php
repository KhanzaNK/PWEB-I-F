<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\JualSampah;
use App\Models\JualProduk;
use App\Models\Order;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalSampahKg = JualSampah::where('user_id', $userId)->sum('berat');
        $totalTransaksi = JualSampah::where('user_id', $userId)->count();
        $pendapatanSampah = JualSampah::where('user_id', $userId)->sum('total_harga');
        $totaljual = JualProduk::where('user_id', $userId)->sum('stok');
        $totalBarangTerjual = OrderItem::whereHas('produk', function ($q) use ($userId) {$q->where('user_id', $userId);})->sum('qty');
        $totalproduk = JualProduk::where('user_id', $userId)->count();
        $pendapatanProduk = OrderItem::whereHas('produk', function ($q) use ($userId) {$q->where('user_id', $userId);})->sum('subtotal');
        $riwayat = JualSampah::where('user_id', $userId)->latest()->limit(5)->get();
        $riwayatproduk = JualProduk::where('user_id', $userId)->latest()->limit(5)->get();

        return view('dashboard', compact(
            'totalSampahKg',
            'totalTransaksi',
            'pendapatanSampah',
            'totaljual',
            'totalBarangTerjual',
            'totalproduk',
            'pendapatanProduk',
            'riwayat',
            'riwayatproduk'
        ));
    }
}

