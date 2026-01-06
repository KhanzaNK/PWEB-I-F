<?php

namespace App\Http\Controllers;

use App\Models\JualProduk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // ambil semua produk
        $products = JualProduk::latest()->get();

        // kelompokkan berdasarkan jenis
        $groupedProducts = $products->groupBy('jenis_produk');

        // ambil cart dari session
        $cart = session()->get('cart', []);

        return view('products.index', compact('groupedProducts', 'cart'));
    }
}
