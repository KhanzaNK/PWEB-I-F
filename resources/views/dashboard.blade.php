@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">

    <div class="col-md-6">
        <div class="card p-4 mb-4">
            <h5 class="fw-bold mb-3"> Informasi Sampah</h5>
            <p class="text-muted">
                Platform kami membantu masyarakat untuk mengelola sampah dengan lebih baik.
                Jual sampah Anda dan dapatkan uang sambil menjaga lingkungan.
            </p>

            <div class="card card-stat p-3 mb-3">
                <small class="text-muted">Total Sampah Terkumpul</small>
                <h3 class="fw-bold">15,000 kg</h3>
                <small>Bulan ini</small>
            </div>

            <div class="card card-stat p-3 mb-3">
                <small class="text-muted">Pengguna Aktif</small>
                <h3 class="fw-bold">2,500+</h3>
                <small>Berkontribusi</small>
            </div>

            <div class="card card-stat p-3">
                <small class="text-muted">Dampak Positif</small>
                <h3 class="fw-bold">95%</h3>
                <small>Sampah didaur ulang</small>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4">
            <h5 class="fw-bold mb-4">📊 Diagram Sampah Per Tahun</h5>
            <canvas id="sampahChart"></canvas>

            <p class="text-muted mt-3">
                Grafik menunjukkan peningkatan signifikan dalam pengumpulan sampah dari tahun ke tahun.
            </p>
        </div>
    </div>

</div>
<!-- KATEGORI SAMPAH -->
<div class="kategori-wrapper mx-auto mt-5">

    <div class="row g-4 justify-content-center">

        <div class="col-12 col-md-4 d-flex justify-content-center">
            <div class="card kategori-card border-success border-2 rounded-4 glow-soft glow-organik">
                <!-- ORGANIK -->
                <div class="mb-3">
                    <span class="fs-1 text-success">🍃</span>
                </div>
                <h5 class="fw-bold">ORGANIK</h5>
                <p class="text-muted">
                    Sampah yang mudah terurai seperti sisa makanan, daun, dan sayuran
                </p>

                <div class="text-start">
                    <strong>Contoh:</strong>
                    <ul class="text-muted mt-2">
                        <li>Sisa makanan</li>
                        <li>Daun kering</li>
                        <li>Kulit buah</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 d-flex justify-content-center">
            <div class="card kategori-card border-primary border-2 rounded-4 glow-soft glow-anorganik">
                <!-- ANORGANIK -->
                <div class="mb-3">
                    <span class="fs-1 text-primary">🗑️</span>
                </div>
                <h5 class="fw-bold">ANORGANIK</h5>
                <p class="text-muted">
                    Sampah yang sulit terurai seperti plastik, logam, dan kaca
                </p>

                <div class="text-start">
                    <strong>Contoh:</strong>
                    <ul class="text-muted mt-2">
                        <li>Botol plastik</li>
                        <li>Kaleng</li>
                        <li>Kertas</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 d-flex justify-content-center">
            <div class="card kategori-card border-danger border-2 rounded-4 glow-soft glow-b3">
                <!-- B3 -->
                <div class="mb-3">
                    <span class="fs-1 text-danger">⚡</span>
                </div>
                <h5 class="fw-bold">B3</h5>
                <p class="text-muted">
                    Bahan Berbahaya dan Beracun yang perlu penanganan khusus
                </p>

                <div class="text-start">
                    <strong>Contoh:</strong>
                    <ul class="text-muted mt-2">
                        <li>Baterai</li>
                        <li>Lampu neon</li>
                        <li>Obat kadaluarsa</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>


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
@push('scripts')
<script>
    const ctx = document.getElementById('sampahChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['2020','2021','2022','2023','2024','2025'],
            datasets: [
                {
                    label: 'Organik (kg)',
                    data: [4000, 5000, 6500, 7800, 9000, 11000],
                    backgroundColor: '#22c55e'
                },
                {
                    label: 'Anorganik (kg)',
                    data: [2500, 3000, 3800, 4500, 5200, 6000],
                    backgroundColor: '#3b82f6'
                },
                {
                    label: 'B3 (kg)',
                    data: [200, 300, 400, 500, 600, 700],
                    backgroundColor: '#ef4444'
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
