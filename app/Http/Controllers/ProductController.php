<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cart = session()->get('cart', []);


        $groupedProducts = $products->groupBy('jenis');


        return view('products.index', compact('groupedProducts', 'cart'));
    }


    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if ($product->stok <= 0) {
            return back();
        }

        if (isset($cart[$id])) {
            if ($cart[$id]['qty'] < $product->stok) {
                $cart[$id]['qty']++;
            }
        } else {
            $cart[$id] = [
                'nama' => $product->nama,
                'harga' => $product->harga,
                'qty' => 1,
                'gambar' => $product->gambar
            ];
        }

        session()->put('cart', $cart);
        return back();
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
        }
        return back();
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id]) && $cart[$id]['qty'] > 1){
            $cart[$id]['qty']--;
            session()->put('cart', $cart);
        }
        return back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return back();
    }
}
