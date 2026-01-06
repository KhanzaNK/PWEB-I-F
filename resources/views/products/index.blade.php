@extends('layouts.app')

@section('title', 'EcoWaste')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div class="py-2">
    <div class="row">

        <!-- ================= PRODUK ================= -->
        <div class="col-md-9">
            <h4 class="mb-3">PRODUK</h4>

            @foreach($groupedProducts as $jenis => $items)
                <h5 class="mt-4 mb-3 text-success text-uppercase fw-bold">
                    {{ $jenis }}
                </h5>

                <div class="row">
                    @foreach($items as $p)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img
                                    src="{{ asset('storage/'.$p->foto) }}"
                                    class="card-img-top"
                                    style="height:160px; object-fit:cover;"
                                >

                                <div class="card-body">
                                    <h6>{{ $p->nama_produk }}</h6>
                                    <p class="text-success mb-1">
                                        Rp {{ number_format($p->harga) }}
                                    </p>
                                    <small>Stok: {{ $p->stok }}</small>
                                </div>

                                <div class="card-footer bg-white">
                                    <a href="{{ route('cart.add', $p->id) }}"
                                       class="btn btn-success btn-sm w-100">
                                        + Tambah
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="text-center my-4">
                <a href="{{ route('jual.form') }}"
                   class="btn btn-primary btn-lg px-5">
                    + Tambah Produk
                </a>
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
                        $nama = $item['nama'] ?? 'Produk';
                        $harga = $item['harga'] ?? 0;
                        $qty = $item['qty'] ?? 1;
                        $subtotal = $harga * $qty;
                        $total += $subtotal;
                    @endphp

                    <div class="bg-white p-2 rounded mb-2">
                        <strong>{{ Str::limit($nama, 20) }}</strong>

                        <p class="text-success mb-1">
                            Rp {{ number_format($harga) }}
                        </p>

                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('cart.decrease', $id) }}"
                               class="btn btn-outline-secondary btn-sm">−</a>

                            <span>{{ $qty }}</span>

                            <a href="{{ route('cart.increase', $id) }}"
                               class="btn btn-outline-secondary btn-sm">+</a>

                            <a href="{{ route('cart.remove', $id) }}"
                               class="btn btn-outline-danger btn-sm ms-auto">🗑</a>
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

                @if(count($cart) > 0)
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button class="btn btn-success w-100 mt-3">
                            Pesan
                        </button>
                    </form>
                @else
                    <button class="btn btn-secondary w-100 mt-3" disabled>
                        Pesan
                    </button>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
