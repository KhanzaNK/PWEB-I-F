@extends('layouts.app')
@section('title','Home')

@section('content')

<div class="row align-items-center mb-5">
    <div class="col-md-6">
        <h1 class="fw-bold">Jual Sampah Jadi Lebih Mudah ♻</h1>
        <p class="text-muted">
            Kelola sampah rumah tangga dan dapatkan penghasilan tambahan.
        </p>
        <a href="/jual" class="btn btn-success btn-lg">Mulai Jual</a>
    </div>
    <div class="col-md-6 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/2909/2909768.png"
             width="300">
    </div>
</div>

<h4 class="mb-3">Kategori Sampah</h4>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Plastik</h5>
                <p>Botol, kantong, kemasan</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Kertas</h5>
                <p>Koran, kardus, buku</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Logam</h5>
                <p>Kaleng, besi, aluminium</p>
            </div>
        </div>
    </div>
</div>

@endsection
