<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JualProduk extends Model
{
    use HasFactory;

    protected $table = 'jual_produk';

    protected $fillable = [
        'foto',
        'jenis_produk',
        'nama_produk',
        'harga',
        'stok',
    ];

    protected $casts = [
        'harga' => 'float',
        'stok' => 'integer',
    ];
}
