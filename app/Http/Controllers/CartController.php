<?php

namespace App\Http\Controllers;

use App\Models\JualProduk;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function add($id)
    {
        $product = JualProduk::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'nama'  => $product->nama_produk,
                'harga' => $product->harga,
                'qty'   => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('products.index');
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }

        return redirect()->route('products.index');
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']--;

            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('products.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->route('products.index');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang kosong');
        }

        foreach ($cart as $item) {
            Cart::create([
                'nama_produk' => $item['nama'],
                'harga' => $item['harga'],
                'qty' => $item['qty'],
                'subtotal' => $item['harga'] * $item['qty'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('products.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

        

}
