<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JualSampah extends Model
{
    use HasFactory;

    protected $table = 'jual_sampah';

    protected $fillable = [
        'jenis_sampah',
        'berat',
        'total_harga',
    ];

    protected $casts = [
        'berat' => 'float',
        'total_harga' => 'float',
    ];
}
