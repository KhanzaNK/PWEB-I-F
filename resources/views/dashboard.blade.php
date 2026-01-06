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

<div class="card p-4 mt-4">
    <h5 class="fw-bold mb-3">🧾 Riwayat Penjualan Terakhir</h5>

    @forelse ($riwayat as $item)
        <div class="d-flex justify-content-between align-items-center
                    border rounded-3 p-3 mb-3">

            <div class="d-flex align-items-center gap-3">
                {{-- ICON JENIS --}}
                <div class="fs-3">
                    @switch($item->jenis_sampah)
                        @case('Plastik') 🧴 @break
                        @case('Logam') 🔩 @break
                        @case('Kertas') 📄 @break
                        @case('Kaca') 🧪 @break
                        @case('Organik') 🍃 @break
                        @default ♻
                    @endswitch
                </div>

                {{-- INFO --}}
                <div>
                    <div class="fw-semibold">
                        {{ $item->jenis_sampah }}
                        <span class="text-muted">• {{ $item->berat }} kg</span>
                    </div>
                    <small class="text-muted">
                        {{ $item->created_at->format('d M Y') }}
                    </small>
                </div>
            </div>

            {{-- STATUS --}}
            <span class="badge bg-warning text-dark px-3 py-2">
                Diproses
            </span>
        </div>
    @empty
        <div class="text-center text-muted py-4">
            <p class="mb-1">Belum ada riwayat penjualan</p>
            <small>Mulai jual sampah untuk melihat riwayat di sini</small>
        </div>
    @endforelse
</div>





@endsection
