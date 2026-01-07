@extends ('layouts.app')
@section ('title', 'EcoWaste')
@section ('content')
    <section class="hero-section">
        <div class= "container">
            <div class= "row align-items-center">
                <div class= "col-md-6">
                    <h1 class="hero-title">JUAL SAMPAH<br>DENGAN MUDAH</h1>
                    <a href="jual/form" class="btn btn-jual">Jual Sekarang</a>
            </div>
            <div class="col-md-6">
                <div class= "stats-card">
                    <h3 class="stats-title">Pencapaian Kami</h3>
                    <div class= "mb-4">
                        <div class= "d-flex justify-content-between align-items-center">
                            <span>Klien</span>
                            <span class= "stats-number">109</span>
                        </div>
                    </div>

                    <div class= "mb-4">
                        <div class= "d-flex justify-content-between align-items-center">
                            <span>Pembelian Sampah</span>
                            <span class= "stats-number">100 KG</span>
                        </div>
                    </div>

                    <div>
                        <div class= "d-flex justify-content-between align-items-center">
                            <span>Cabang</span>
                            <span class = "stats-number">5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 80px 0;">
        <div class="container">
            <h2 class="section-title">Jenis Sampah Yang Dapat Dijual</h2>
            <div class="row g-4">
                @forelse($jenisSampah as $sampah)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-icon">
                            <i class="{{ $sampah->icon ?? 'fas fa-box' }}"></i>
                        </div>
                        <h3 class="product-name">{{ $sampah->jenis_sampah }}</h3>
                        <p class="product-price-label">Harga (per kg):</p>
                        <p class="product-price">Rp {{ number_format($sampah->harga_per_kg, 0, ',', '.') }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>Belum ada produk yang tersedia</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="keuntungan-section">
        <div class="container">
            <h2 class="section-title">Keuntungan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="keuntungan-card">
                        <div class="keuntungan-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4>Ramah Lingkungan</h4>
                        <p>Membantu mengurangi limbah dan menjaga kebersihan lingkungan</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="keuntungan-card">
                        <div class="keuntungan-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Dapatkan Penghasilan</h4>
                        <p>Ubah sampah menjadi uang dengan harga yang kompetitif</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="keuntungan-card">
                        <div class="keuntungan-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4>Pickup Service</h4>
                        <p>Layanan penjemputan sampah langsung ke lokasi Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection