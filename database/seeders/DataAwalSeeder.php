<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JualSampah;
use App\Models\JualProduk;

class DataAwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                JualSampah::create([
            'user_id' => 1,
            'jenis_sampah' => 'Plastik',
            'berat' => 2.5,
            'total_harga' => 12500,
        ]);

        JualSampah::create([
            'user_id' => 1,
            'jenis_sampah' => 'Kertas',
            'berat' => 1.2,
            'total_harga' => 3600,
        ]);

        // sample jual_produk entries
        JualProduk::create([
            'user_id' => 1,
            'foto' => 'produk1.jpg',
            'jenis_produk' => 'Kerajinan Daur Ulang',
            'nama_produk' => 'tas',
            'harga' => 15000,
            'stok' => 10,
        ]);

        JualProduk::create([
            'user_id' => 1,
            'foto' => 'produk2.jpg',
            'jenis_produk' => 'Aksesoris',
            'nama_produk' => 'Gelang',
            'harga' => 5000,
            'stok' => 25,
        ]);
    }
}
