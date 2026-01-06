<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'nama' => 'Kompos Organik',
            'harga' => 25000,
            'stok' => 10,
            'gambar' => 'kompos.jpg',
            'jenis' => 'organik'
        ]);

        Product::create([
            'nama' => 'Pupuk Cair',
            'harga' => 15000,
            'stok' => 15,
            'gambar' => 'pupuk.jpg',
            'jenis' => 'organik'
        ]);

        Product::create([
            'nama' => 'Tas Daur Ulang',
            'harga' => 75000,
            'stok' => 5,
            'gambar' => 'tas.jpg',
            'jenis' => 'kerajinan'
        ]);

        Product::create([
            'nama' => 'Dompet Kertas',
            'harga' => 30000,
            'stok' => 8,
            'gambar' => 'dompet.jpg',
            'jenis' => 'kerajinan'
        ]);
    }
}
