@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row g-4">

    <div class="col-md-6">
        <div class="card p-4 mb-4">
            <h5 class="fw-bold mb-3">ℹ Informasi Sampah</h5>
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

<div class="kategori-wrapper mx-auto mt-5">

    <div class="row g-4 justify-content-center">

        <div class="col-12 col-md-4 d-flex justify-content-center">
            <div class="card kategori-card border-success border-2 rounded-4 glow-soft glow-organik">

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


    </div>
</div>

<div class="mt-5 p-5 rounded-4 text-center"
     style="background: linear-gradient(135deg, #ecfdf3, #f0fdf9);">

    <div class="mb-3">
        <div class="rounded-circle bg-success d-inline-flex 
                    align-items-center justify-content-center"
             style="width:80px;height:80px;">
            <span class="text-white fs-2">♻</span>
        </div>
    </div>

    <h2 class="fw-bold">Jual Sampah Kamu</h2>

    <p class="text-muted mx-auto" style="max-width:700px;">
        Ubah sampah menjadi uang! Kami menerima berbagai jenis sampah yang dapat didaur ulang.
        Daftar sekarang dan mulai berkontribusi untuk lingkungan yang lebih bersih sambil
        mendapatkan penghasilan tambahan.
    </p>

    <a href="/jual" class="btn btn-success px-4 py-2 mt-3">
        Klik Disini →
    </a>


    <div class="row mt-5">
        <div class="col-md-4">
            <h3 class="text-success fw-bold">1</h3>
            <p class="text-muted">Pilah Sampah</p>
        </div>
        <div class="col-md-4">
            <h3 class="text-success fw-bold">2</h3>
            <p class="text-muted">Hubungi Kami</p>
        </div>
        <div class="col-md-4">
            <h3 class="text-success fw-bold">3</h3>
            <p class="text-muted">Dapatkan Uang</p>
        </div>
    </div>
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
