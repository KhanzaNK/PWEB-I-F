<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\sampah_model;

class SampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sampah_model::insert([
            [
                'jenis_sampah' => 'Plastik',
                'harga_per_kg' => 2000,
                'jumlah_kg' => 100,
                'icon' => 'fas fa-recycle'
            ],
            [
                'jenis_sampah' => 'Kertas',
                'harga_per_kg' => 1500,
                'jumlah_kg' => 150,
                'icon' => 'fas fa-file-alt'
            ],
            [
                'jenis_sampah' => 'Logam',
                'harga_per_kg' => 5000,
                'jumlah_kg' => 50,
                'icon' => 'fas fa-cogs'
            ],
        ]);
    }
}
