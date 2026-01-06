@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card p-4">
    <h2 class="fw-bold mb-2">
        Selamat datang 👋
    </h2>

    <p class="text-muted mb-4">
        Kelola penjualan sampahmu di sini
    </p>

    <div class="d-flex gap-3">
        <a href="/jual" class="btn btn-success">
            Jual Sampah
        </a>

        <a href="/toko" class="btn btn-outline-primary">
            Toko
        </a>
    </div>
</div>
<div class="row mt-4 g-3">
    <div class="col-md-4">
        <div class="card p-3">
            <small class="text-muted">Total Sampah Dijual</small>
            <h4 class="fw-bold">{{ $totalSampahKg ?? 0 }} kg</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <small class="text-muted">Total Transaksi</small>
            <h4 class="fw-bold">{{ $totalTransaksi ?? 0 }}</h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <small class="text-muted">Estimasi Pendapatan</small>
            <h4 class="fw-bold text-success">
                Rp {{ number_format($pendapatanSampah ?? 0) }}
            </h4>
        </div>
    </div>
</div>

<tbody>
@forelse ($riwayat as $item)
    <tr>
        <td>{{ $item->created_at->format('d/m/Y') }}</td>
        <td>{{ $item->jenis_sampah }}</td>
        <td>{{ $item->berat }} kg</td>
        <td><span class="badge bg-warning">Diproses</span></td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center text-muted">
            Belum ada penjualan
        </td>
    </tr>
@endforelse
</tbody>



@endsection
