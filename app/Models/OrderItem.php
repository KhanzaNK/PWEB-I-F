<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JualProduk;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'produk_id',
        'nama_produk',
        'harga',
        'qty',
        'subtotal',
    ];

    public function produk()
    {
        return $this->belongsTo(JualProduk::class, 'produk_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
