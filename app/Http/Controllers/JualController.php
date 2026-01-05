<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sampah_model as Sampah;

class JualController extends Controller
{
    public function index()
    {
        $jenisSampah = Sampah::select('jenis_sampah', 'harga_per_kg', 'icon')->get();
        return view('jual', compact('jenisSampah'));
    }
    public function show($id)
    {
        $sampah = Sampah::find($id);
        return view('detail_sampah', compact('sampah'));
    }   
}
