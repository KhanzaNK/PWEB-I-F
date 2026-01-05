<!DOCTYPE html>
<html>
<head>
    <title>Toko Organik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

@php use Illuminate\Support\Str; @endphp

<div class="container py-4">
    <div class="row">

        <!-- ================= PRODUK ================= -->
        <div class="col-md-9">
            <h4 class="mb-3">PRODUK</h4>

            @foreach($groupedProducts as $jenis => $items)
                <h5 class="mt-4 mb-3 text-success text-uppercase fw-bold">{{ $jenis }}</h5>

                <div class="row">
                    @foreach($items as $p)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('storage/'.$p->gambar) }}" class="card-img-top" style="height:160px; object-fit:cover;">
                                <div class="card-body">
                                    <h6>{{ $p->nama }}</h6>
                                    <p class="text-success mb-1">
                                        Rp {{ number_format($p->harga) }}
                                    </p>
                                    <small>Stok: {{ $p->stok }}</small>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="{{ route('cart.add', $p->id) }}" class="btn btn-success btn-sm w-100">
                                        + Tambah
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <!-- TOMBOL TAMBAH PRODUK -->
            <div class="text-center my-4">
                <button class="btn btn-primary btn-lg px-5">
                    + Tambah Produk
                </button>
            </div>
        </div>

        <!-- ================= KERANJANG ================= -->
        <div class="col-md-3">
            <div class="card border-success p-3" style="background:#ecfff4">
                <h6 class="mb-2">🛒 <strong>Keranjang</strong></h6>

                <hr class="my-2">

                @php $total = 0; @endphp

                @forelse($cart as $id => $item)
                    @php
                        $subtotal = $item['harga'] * $item['qty'];
                        $total += $subtotal;
                    @endphp

                    <div class="bg-white p-2 rounded mb-2">
                        <strong>{{ Str::limit($item['nama'], 20) }}</strong>
                        <p class="text-success mb-1">
                            Rp {{ number_format($item['harga']) }}
                        </p>

                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('cart.decrease', $id) }}" class="btn btn-outline-secondary btn-sm">−</a>
                            <span>{{ $item['qty'] }}</span>
                            <a href="{{ route('cart.increase', $id) }}" class="btn btn-outline-secondary btn-sm">+</a>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-outline-danger btn-sm ms-auto">🗑</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Keranjang masih kosong</p>
                @endforelse

                <hr class="my-2">

                <div class="d-flex justify-content-between">
                    <strong>Total:</strong>
                    <strong class="text-success">
                        Rp {{ number_format($total) }}
                    </strong>
                </div>

                <button class="btn btn-success w-100 mt-3">
                    Pesan
                </button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
