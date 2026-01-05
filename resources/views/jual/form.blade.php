@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="page-inner">
    <div class="mb-4">
        <a href="{{ url('/') }}" class="btn btn-light border">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle"></i> <strong>Validasi gagal!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <h2 class="text-center mb-4 fw-bold display-title">Formulir Penjualan</h2>

    <div class="row justify-content-center align-items-start forms-row">
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header header-green">
                    <h6 class="mb-0">Jual Sampah</h6>
                </div>
                <div class="card-body">
                    <form id="formSampah" action="{{ route('jual.sampah') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                            <select class="d-none @error('jenis_sampah') is-invalid @enderror" 
                                    id="jenis_sampah" name="jenis_sampah" required>
                                <option value="">Pilih jenis sampah</option>
                                <option value="Plastik" {{ old('jenis_sampah') == 'Plastik' ? 'selected' : '' }}>Plastik</option>
                                <option value="Logam" {{ old('jenis_sampah') == 'Logam' ? 'selected' : '' }}>Logam</option>
                                <option value="Kertas" {{ old('jenis_sampah') == 'Kertas' ? 'selected' : '' }}>Kertas</option>
                                <option value="Kaca" {{ old('jenis_sampah') == 'Kaca' ? 'selected' : '' }}>Kaca</option>
                                <option value="Organik" {{ old('jenis_sampah') == 'Organik' ? 'selected' : '' }}>Organik</option>
                            </select>

                            <div class="custom-select-ui" data-target="jenis_sampah" tabindex="0" aria-haspopup="listbox">
                                <div class="custom-select-trigger"><span class="trigger-text">{{ old('jenis_sampah') ?: 'Pilih jenis sampah' }}</span><i class="fas fa-chevron-down caret-icon"></i></div>
                                <div class="custom-options" role="listbox" tabindex="-1">
                                    <div class="custom-option" data-value="Plastik"><span class="option-label">Plastik</span><span class="option-meta"></span></div>
                                    <div class="custom-option" data-value="Logam"><span class="option-label">Logam</span><span class="option-meta"></span></div>
                                    <div class="custom-option" data-value="Kertas"><span class="option-label">Kertas</span><span class="option-meta"></span></div>
                                    <div class="custom-option" data-value="Kaca"><span class="option-label">Kaca</span><span class="option-meta"></span></div>
                                    <div class="custom-option" data-value="Organik"><span class="option-label">Organik</span><span class="option-meta"></span></div>
                                </div>
                            </div>
                            @error('jenis_sampah')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="berat" class="form-label">Total Berat (kg)</label>
                            <input type="number" step="0.1" min="0" 
                                   class="form-control form-control-sm @error('berat') is-invalid @enderror" 
                                   id="berat" name="berat" placeholder="0.0" 
                                   value="{{ old('berat', '0.0') }}" required 
                                   onchange="hitungTotalSampah()" oninput="hitungTotalSampah()">
                            @error('berat')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_harga_sampah" class="form-label">Total Harga</label>
                            <input type="text" class="form-control form-control-sm bg-light" id="total_harga_sampah" 
                                placeholder="Rp 0" value="Rp 0" disabled readonly>
                        </div>

                        <div class="mt-auto">
                            <button type="submit" class="btn btn-success w-100 fw-bold btn-kirim" id="btnSimpanSampah">
                                <i class="fas fa-check me-2"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow">
                <div class="card-header header-blue">
                    <h6 class="mb-0">Jual Produk</h6>
                </div>
                <div class="card-body">
                    <form id="formProduk" action="{{ route('jual.produk') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <div class="d-flex align-items-center gap-3">
                                <label class="upload-btn" for="fotoInput">
                                    <i class="fas fa-upload me-2"></i> Upload Foto
                                </label>
                                <span id="fileName" class="text-muted small">Tidak ada file dipilih</span>
                            </div>
                            <input type="file" class="d-none @error('foto') is-invalid @enderror" 
                                   id="fotoInput" name="foto" accept="image/*" required>
                            @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div id="previewFoto" class="mt-2"></div>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_produk" class="form-label">Jenis Produk</label>

                            <select id="jenis_produk" name="jenis_produk" class="d-none @error('jenis_produk') is-invalid @enderror" required>
                                <option value="">Pilih jenis produk</option>
                                <option value="Kerajinan Daur Ulang" {{ old('jenis_produk') == 'Kerajinan Daur Ulang' ? 'selected' : '' }}>Kerajinan Daur Ulang</option>
                                <option value="Tas Daur Ulang" {{ old('jenis_produk') == 'Tas Daur Ulang' ? 'selected' : '' }}>Tas Daur Ulang</option>
                                <option value="Furniture Daur Ulang" {{ old('jenis_produk') == 'Furniture Daur Ulang' ? 'selected' : '' }}>Furniture Daur Ulang</option>
                                <option value="Aksesoris" {{ old('jenis_produk') == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                <option value="Lainnya" {{ old('jenis_produk') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>

                            <div class="custom-select-ui" data-target="jenis_produk" tabindex="0" aria-haspopup="listbox">
                                <div class="custom-select-trigger"><span class="trigger-text">{{ old('jenis_produk') ?: 'Pilih jenis produk' }}</span><i class="fas fa-chevron-down caret-icon"></i></div>
                                <div class="custom-options" role="listbox">
                                    <div class="custom-option" data-value="Kerajinan Daur Ulang"><span class="option-label">Kerajinan Daur Ulang</span></div>
                                    <div class="custom-option" data-value="Tas Daur Ulang"><span class="option-label">Tas Daur Ulang</span></div>
                                    <div class="custom-option" data-value="Furniture Daur Ulang"><span class="option-label">Furniture Daur Ulang</span></div>
                                    <div class="custom-option" data-value="Aksesoris"><span class="option-label">Aksesoris</span></div>
                                    <div class="custom-option" data-value="Lainnya"><span class="option-label">Lainnya</span></div>
                                </div>
                            </div>

                            @error('jenis_produk')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control form-control-sm @error('nama_produk') is-invalid @enderror" 
                                   id="nama_produk" name="nama_produk" placeholder="Nama produk" 
                                   value="{{ old('nama_produk') }}" required>
                            @error('nama_produk')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" min="100" class="form-control form-control-sm @error('harga') is-invalid @enderror" 
                                   id="harga" name="harga" placeholder="0" 
                                   value="{{ old('harga') }}" required>
                            @error('harga')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" min="1" max="10000" class="form-control form-control-sm @error('stok') is-invalid @enderror" 
                                   id="stok" name="stok" placeholder="1" 
                                   value="{{ old('stok') }}" required>
                            @error('stok')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-auto">
                            <button type="submit" class="btn btn-success w-100 fw-bold btn-kirim" id="btnSimpanProduk">
                                <i class="fas fa-check me-2"></i> Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    :root {
        --primary: #000000ff;
        --primary-light: #f3f3f5;
        --secondary: #e9ebef;
        --destructive: #d4183d;
        --border-color: rgba(0, 0, 0, 0.1);
        --radius: 0.625rem;
        --text-muted: #717182;
    }

    * {
        border-color: var(--border-color);
    }

    body {
        background-color: #ffffff;
        color: var(--primary);
        font-size: 16px;
    }

    .container {
        max-width: 1400px;
    }

    .display-title {
        font-size: 30px;
        font-weight: 400;
        letter-spacing: -0.6px;
        margin-top: 0.5rem;
        margin-bottom: 2rem;
        color: #0b1220;
    }

    .card {
        border-radius: 10px;
        border: 1px solid var(--card-border);
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(2,6,23,0.06);
        min-height: 420px; 
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        background: #ffffff;
    }

    .card-header {
        padding: 1rem 1rem;
        border: none;
        font-weight: 400;
        border-radius: 10px 10px 0 0;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .header-green { background: transparent; }
    .header-blue { background: transparent; }

    .card-header h6 {
        font-size: 1.25rem;
        font-weight: 400;
        margin: 0;
        padding: 0;
        color: #000000;
        letter-spacing: -0.5px;
        line-height: 1.4;
    }

    .card-body {
        padding: 1rem;
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
    }

    .form-control, .form-select {
        font-size: 0.95rem;
        border-radius: 8px;
        border: 1px solid rgba(15,23,42,0.06);
        background-color: #f3f4f6;
        padding: 0.65rem 0.85rem;
        height: auto;
        font-weight: 400;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        background-color: #ffffff;
        box-shadow: 0 0 0 2px rgba(3, 2, 19, 0.1);
    }

    .form-label {
        font-size: 0.875rem;
        font-weight: 400;
        margin-bottom: 0.5rem;
        color: var(--primary);
        display: block;
    }

    .btn {
        font-size: 0.875rem;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: calc(var(--radius) - 2px);
        border: 1px solid transparent;
        height: auto;
    }

    .btn-light {
        background-color: transparent;
        color: var(--primary);
        border-color: var(--border-color);
        padding: 0.45rem 0.8rem;
        border-radius: 12px;
    }

    .btn-light:hover {
        background-color: var(--secondary);
        border-color: var(--border-color);
    }

    .btn-success {
        background-color: oklch(0.627 0.194 149.214);
        color: #ffffff;
        border-color: oklch(0.627 0.194 149.214);
        padding: 0.7rem 1rem;
        border-radius: 8px;
        font-size: 1rem;
        box-shadow: none;
    }

    .btn-success:hover {
        background-color: oklch(0.550 0.170 149.214);
        border-color: #16a34a;
    }

    .btn-primary {
        background-color: var(--primary);
        color: #ffffff;
        border-color: var(--primary);
    }

    .btn-primary:hover {
        background-color: #1a1410;
        border-color: #1a1410;
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .form-control.is-invalid, .form-select.is-invalid {
        border-color: var(--destructive);
        background-color: rgba(212, 24, 61, 0.05);
    }

    .invalid-feedback, small.text-danger {
        font-size: 0.75rem;
        color: var(--destructive);
        display: block;
        margin-top: 0.25rem;
    }

    .alert {
        border-radius: var(--radius);
        border: 1px solid var(--border-color);
        padding: 0.875rem 1rem;
        font-size: 0.875rem;
    }

    .alert-success {
        background-color: #f0fdf4;
        color: #166534;
        border-color: #86efac;
    }

    .alert-danger {
        background-color: #fef2f2;
        color: #991b1b;
        border-color: #fecaca;
    }

    .mb-3, .mb-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 2rem !important;
    }

    .row.g-4 {
        gap: 1.5rem !important;
    }

    small {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .upload-label {
        border-radius: 10px;
        padding: 0.45rem 0.8rem;
    }

    #fileName {
        font-size: 0.85rem;
    }

    .upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 0.9rem;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        background-color: #ffffff;
        color: var(--primary);
        font-size: 0.9rem;
    }

    .upload-btn i { font-size: 14px; }

    .btn-light i { margin-right: .5rem; }
    .btn-light i { margin-right: .5rem; }

    .forms-row {
        gap: 8rem;
        justify-content: center;
    }

    .forms-row > .col-lg-3 { max-width: 340px; }

    @media (max-width: 991px) {
        .forms-row { gap: 2rem; }
        .display-title { font-size: 36px; }
        .forms-row > .col-lg-3 { max-width: 100%; }
        .card { min-height: auto; }
    }

    .custom-select-ui {
        position: relative;
        width: 100%;
        border-radius: 8px;
        background: #f3f4f6;
        border: 1px solid rgba(15,23,42,0.06);
        cursor: pointer;
        user-select: none;
    }


    .custom-select-trigger {
        padding: 0.5rem 0.9rem;
        font-size: 0.95rem;
        color: #111827;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    .caret-icon { color: rgba(15,23,42,0.6); transition: transform 180ms ease; }

    .custom-options {
        position: absolute;
        left: 6px;
        right: 6px;
        top: calc(100% + 10px);
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 14px 40px rgba(2,6,23,0.12);
        max-height: 260px;
        overflow: auto;
        z-index: 1200;
        padding: 8px 6px;
        opacity: 0;
        transform: translateY(-6px);
        transition: opacity 220ms ease, transform 220ms ease;
        pointer-events: none;
        visibility: hidden;
    }

    .custom-select-ui.open .custom-options {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
        visibility: visible;
    }

    .custom-select-ui.open .caret-icon { transform: rotate(180deg); }

    .custom-option {
        padding: 0.7rem 0.9rem;
        border-radius: 8px;
        margin: 6px 4px;
        cursor: pointer;
        color: #0b1220;
        background: transparent;
    }

    .custom-option:hover, .custom-option.selected {
        background: #f3f4f6;
    }

    .custom-options::-webkit-scrollbar { height: 8px; width: 8px; }
    .custom-options::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.08); border-radius: 8px; }

    .form-control, .form-select, .upload-btn {
        transition: box-shadow 180ms ease, transform 180ms ease, border-color 180ms ease, background-color 180ms ease;
    }

    .form-control:focus, .form-select:focus {
        box-shadow: 0 6px 20px rgba(16,185,129,0.12);
        border-color: #10B981;
        background-color: #ffffff;
        transform: translateY(-2px);
        outline: none;
    }

    .card.focused {
        transform: translateY(-8px);
        box-shadow: 0 18px 40px rgba(2,6,23,0.12);
    }

    .upload-selected {
        animation: pulse 900ms ease-in-out 1;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.03); }
        100% { transform: scale(1); }
    }
</style>

<script>
    const hargaSampah = {
        'Plastik': 5000,
        'Logam': 15000,
        'Kertas': 3000,
        'Kaca': 2000,
        'Organik': 1000
    };

    function hitungTotalSampah() {
        const jenisSampah = document.getElementById('jenis_sampah').value;
        const berat = parseFloat(document.getElementById('berat').value) || 0;
        const totalInput = document.getElementById('total_harga_sampah');

        if (jenisSampah && berat > 0) {
            const totalHarga = berat * hargaSampah[jenisSampah];
            totalInput.value = 'Rp ' + totalHarga.toLocaleString('id-ID');
        } else {
            totalInput.value = 'Rp 0';
        }
    }

    const fotoInput = document.getElementById('fotoInput');
    const fileNameSpan = document.getElementById('fileName');
    if (fotoInput) {
        fotoInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const previewDiv = document.getElementById('previewFoto');

            if (file) {
                fileNameSpan.textContent = file.name;
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewDiv.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 120px; max-height: 120px; border-radius:8px;">`;
                };
                reader.readAsDataURL(file);
            } else {
                fileNameSpan.textContent = 'Tidak ada file dipilih';
                previewDiv.innerHTML = '';
            }
        });
    }

    // calculate total on load (so default 0.0 shows correctly)
    document.addEventListener('DOMContentLoaded', function () {
        hitungTotalSampah();
        initCustomSelects();
    });

    function initCustomSelects() {
        const uis = document.querySelectorAll('.custom-select-ui');
        uis.forEach(ui => {
            const targetId = ui.dataset.target;
            const select = document.getElementById(targetId);
            const trigger = ui.querySelector('.custom-select-trigger');
            const options = Array.from(ui.querySelectorAll('.custom-option'));

            // initialize trigger text from native select value if present
            const triggerText = trigger.querySelector('.trigger-text') || trigger;
            if (select && select.value) {
                const opt = options.find(o => o.dataset.value === select.value);
                if (opt) {
                    const label = opt.querySelector('.option-label') ? opt.querySelector('.option-label').textContent : opt.textContent;
                    triggerText.textContent = label;
                    opt.classList.add('selected');
                }
            }

            // if this is the sampah select, fill option meta using hargaSampah
            if (targetId === 'jenis_sampah') {
                options.forEach(o => {
                    const val = o.dataset.value;
                    const meta = o.querySelector('.option-meta');
                    if (meta && typeof hargaSampah[val] !== 'undefined') {
                        meta.textContent = ' - Rp ' + hargaSampah[val].toLocaleString('id-ID') + '/kg';
                    }
                });
            }

            // open/close on click
            ui.addEventListener('click', function (e) {
                ui.classList.toggle('open');
            });

            // option click
            options.forEach(opt => {
                opt.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const val = this.dataset.value;
                    if (select) {
                        select.value = val;
                        // trigger change on native select for any listeners
                        const ev = new Event('change', { bubbles: true });
                        select.dispatchEvent(ev);
                    }
                    // update UI (only label text)
                    const label = this.querySelector('.option-label') ? this.querySelector('.option-label').textContent : this.textContent;
                    triggerText.textContent = label;
                    options.forEach(x => x.classList.remove('selected'));
                    this.classList.add('selected');
                    ui.classList.remove('open');

                    // run sampah total recalc if it's the sampah select
                    if (targetId === 'jenis_sampah') hitungTotalSampah();
                });
            });

            // close when clicking outside
            document.addEventListener('click', function (e) {
                if (!ui.contains(e.target)) ui.classList.remove('open');
            });

            // keyboard access
            ui.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); ui.classList.toggle('open'); }
                if (e.key === 'Escape') ui.classList.remove('open');
            });
        });
    }

    // Add focus animation: highlight card when any input/select inside is focused
    (function () {
        document.addEventListener('focusin', function (e) {
            const card = e.target.closest('.card');
            if (card) card.classList.add('focused');
        });

        document.addEventListener('focusout', function (e) {
            const card = e.target.closest('.card');
            if (card) {
                // remove after small delay so users see transition
                setTimeout(() => card.classList.remove('focused'), 120);
            }
        });

        // upload selected visual
        const fotoInput = document.getElementById('fotoInput');
        const fileNameSpan = document.getElementById('fileName');
        if (fotoInput) {
            fotoInput.addEventListener('change', function () {
                const file = this.files[0];
                const label = document.querySelector('.upload-btn') || document.querySelector('.upload-label');
                if (file) {
                    fileNameSpan.textContent = file.name;
                    label && label.classList.add('upload-selected');
                    setTimeout(() => label && label.classList.remove('upload-selected'), 900);
                } else {
                    fileNameSpan.textContent = 'Tidak ada file dipilih';
                }
            });
        }
    })();

    // Equalize card heights so both forms have same vertical length
    function equalizeCardHeights() {
        const row = document.querySelector('.forms-row');
        if (!row) return;
        const cards = Array.from(row.querySelectorAll('.card'));
        if (!cards.length) return;
        // reset heights
        cards.forEach(c => c.style.minHeight = '');
        // compute max
        const heights = cards.map(c => c.getBoundingClientRect().height);
        const maxH = Math.max(...heights);
        // add a small buffer
        const finalH = Math.max(maxH, 420);
        cards.forEach(c => c.style.minHeight = finalH + 'px');
    }

    window.addEventListener('load', equalizeCardHeights);
    window.addEventListener('resize', function () {
        // debounce
        clearTimeout(window._equalizeTimer);
        window._equalizeTimer = setTimeout(equalizeCardHeights, 120);
    });
    // re-run when file preview changes
    const fotoInput2 = document.getElementById('fotoInput');
    if (fotoInput2) fotoInput2.addEventListener('change', function () { setTimeout(equalizeCardHeights, 200); });

    const formSampah = document.getElementById('formSampah');
    if (formSampah) {
        formSampah.addEventListener('submit', function () {
            const btn = document.getElementById('btnSimpanSampah');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menyimpan...';
        });
    }

    const formProduk = document.getElementById('formProduk');
    if (formProduk) {
        formProduk.addEventListener('submit', function () {
            const btn = document.getElementById('btnSimpanProduk');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menyimpan...';
        });
    }
</script>
@endsection
