<?php

namespace App\Http\Controllers;

use App\Models\JualProduk;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $products = JualProduk::latest()->get();
        $groupedProducts = $products->groupBy('jenis_produk');
        $cart = session()->get('cart', []);

        return view('products.index', compact('groupedProducts', 'cart'));
    }

    public function add($id)
    {
        $product = JualProduk::findOrFail($id);

        $cart = session()->get('cart', []);

        // Prevent adding if no stock
        if ($product->stok <= 0) {
            return redirect()->back()->with('error', 'Stok tidak tersedia');
        }

        if (isset($cart[$id])) {
            $newQty = $cart[$id]['qty'] + 1;
            if ($newQty > $product->stok) {
                return redirect()->back()->with('error', 'Jumlah melebihi stok tersedia');
            }
            $cart[$id]['qty'] = $newQty;
            $cart[$id]['subtotal'] = $cart[$id]['qty'] * $cart[$id]['harga'];
        } else {
            $cart[$id] = [
                'produk_id' => $product->id,
                'nama_produk' => $product->nama_produk ?? $product->nama ?? 'Produk',
                'harga' => (int) $product->harga,
                'qty' => 1,
                'subtotal' => (int) $product->harga,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $product = JualProduk::find($cart[$id]['produk_id'] ?? $id);
            $newQty = $cart[$id]['qty'] + 1;
            if ($product && $newQty > $product->stok) {
                return redirect()->back()->with('error', 'Jumlah melebihi stok tersedia');
            }
            $cart[$id]['qty'] = $newQty;
            $cart[$id]['subtotal'] = $cart[$id]['qty'] * $cart[$id]['harga'];
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] -= 1;
            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['subtotal'] = $cart[$id]['qty'] * $cart[$id]['harga'];
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        if (!Auth::check()) {
            // redirect to login if user not authenticated
            return redirect()->route('login')->with('error', 'Please login to checkout');
        }

        $userId = Auth::id();

        DB::beginTransaction();
        try {
            $total = array_sum(array_map(function ($item) { return $item['subtotal']; }, $cart));

            $order = Order::create([
                'user_id' => $userId,
                'total' => $total,
                'status' => 'paid',
            ]);

            foreach ($cart as $item) {
                // check and decrement stock if product exists
                $produkId = $item['produk_id'] ?? null;
                if ($produkId) {
                    $product = JualProduk::lockForUpdate()->find($produkId);
                    if (!$product) {
                        throw new \Exception('Produk tidak ditemukan: ' . $produkId);
                    }
                    if ($product->stok < $item['qty']) {
                        throw new \Exception('Stok tidak cukup untuk: ' . $product->nama_produk);
                    }
                    $product->stok = $product->stok - $item['qty'];
                    $product->save();
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'produk_id' => $produkId,
                    'nama_produk' => $item['nama_produk'],
                    'harga' => $item['harga'],
                    'qty' => $item['qty'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();

            // clear cart after successful order
            session()->forget('cart');

            return redirect()->route('products.index')->with('success', 'Checkout successful');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }
}
