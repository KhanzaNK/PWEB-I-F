<?php

namespace App\Http\Controllers;

use App\Models\JualSampah;
use App\Models\JualProduk;
use Illuminate\Http\Request;

class FormPenjualanController extends Controller
{
 
    public function index()
    {
        return view('jual.form');
    }


    public function storeSampah(Request $request)
    {

        $validated = $request->validate([
            'jenis_sampah' => 'required|string|in:Plastik,Logam,Kertas,Kaca,Organik',
            'berat' => 'required|numeric|min:0.1|max:1000',
        ], [
            'jenis_sampah.required' => 'Jenis sampah harus dipilih',
            'jenis_sampah.in' => 'Jenis sampah tidak valid',
            'berat.required' => 'Berat sampah harus diisi',
            'berat.numeric' => 'Berat harus berupa angka',
            'berat.min' => 'Berat minimal 0.1 kg',
            'berat.max' => 'Berat maksimal 1000 kg',
        ]);


        $hargaPerKg = [
            'Plastik' => 5000,
            'Logam' => 15000,
            'Kertas' => 3000,
            'Kaca' => 2000,
            'Organik' => 1000,
        ];


        $totalHarga = $validated['berat'] * $hargaPerKg[$validated['jenis_sampah']];


        JualSampah::create([
            'user_id' => auth()->id(),
            'jenis_sampah' => $validated['jenis_sampah'],
            'berat' => $validated['berat'],
            'total_harga' => $totalHarga,
        ]);

        return back()->with('success', 'Data penjualan sampah berhasil disimpan!');
    }


    public function storeProduk(Request $request)
    {

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jenis_produk' => 'required|string',
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|numeric|min:100|max:999999999',
            'stok' => 'required|integer|min:1|max:10000',
        ], [
            'foto.required' => 'Foto produk harus diupload',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus JPEG, PNG, JPG, atau GIF',
            'foto.max' => 'Ukuran gambar maksimal 2 MB',
            'jenis_produk.required' => 'Jenis produk harus diisi',
            'nama_produk.required' => 'Nama produk harus diisi',
            'nama_produk.max' => 'Nama produk maksimal 100 karakter',
            'harga.required' => 'Harga harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'harga.min' => 'Harga minimal Rp 100',
            'harga.max' => 'Harga terlalu besar',
            'stok.required' => 'Stok harus diisi',
            'stok.integer' => 'Stok harus berupa angka bulat',
            'stok.min' => 'Stok minimal 1 unit',
            'stok.max' => 'Stok maksimal 10000 unit',
        ]);


        $fotoPath = $request->file('foto')->store('produk', 'public');


        JualProduk::create([
            'user_id' => auth()->id(),
            'foto' => $fotoPath,
            'jenis_produk' => $validated['jenis_produk'],
            'nama_produk' => $validated['nama_produk'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
        ]);

        return back()->with('success', 'Data produk berhasil disimpan!');
    }
}
