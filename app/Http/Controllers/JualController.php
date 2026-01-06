<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JualController extends Controller
{

    public function index()
    {
        $jenisSampah = collect([
            (object)[ 'jenis_sampah' => 'Plastik', 'harga_per_kg' => 5000, 'icon' => 'fas fa-recycle' ],
            (object)[ 'jenis_sampah' => 'Kertas', 'harga_per_kg' => 3000, 'icon' => 'fas fa-file-alt' ],
            (object)[ 'jenis_sampah' => 'Logam',  'harga_per_kg' => 15000, 'icon' => 'fas fa-cogs' ],
            (object)[ 'jenis_sampah' => 'Kaca',   'harga_per_kg' => 2000, 'icon' => 'fas fa-wine-glass-alt' ],
            (object)[ 'jenis_sampah' => 'Organik', 'harga_per_kg' => 1000, 'icon' => 'fas fa-seedling' ],
            (object)[ 'jenis_sampah' => 'Lainnya', 'harga_per_kg' => 2000, 'icon' => 'fas fa-box-open' ],
        ]);

        return view('jual', compact('jenisSampah'));
    }
}
