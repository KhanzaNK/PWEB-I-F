<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EcoWaste - Jual Beli')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-recycle"></i> EcoWaste
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('jual*') ? 'active' : '' }}" href="{{ route('jual') }}">JUAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('toko') ? 'active' : '' }}" href="{{ route('toko') }}">TOKO</a>
                    </li>
                </ul>
                @auth
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                @endauth
            </div>
        </div>
    </nav>
    <div>
    <!-- Main Content -->
    @yield('content')
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="footer-title">Tentang Kami</h4>
                    <p>EcoWaste adalah platform jual beli sampah yang memudahkan masyarakat untuk mendaur ulang sampah dan mendapatkan penghasilan tambahan.</p>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-title">Layanan</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('jual') }}">Jual Sampah</a></li>
                        <li><a href="{{ route('toko') }}">Beli Produk Daur Ulang</a></li>
                        <li><a href="#">Pickup Service</a></li>
                        <li><a href="#">Edukasi Lingkungan</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-title">Kontak</h4>
                    <ul class="footer-links">
                        <li><i class="fas fa-phone"></i> +62 812-3456-7890</li>
                        <li><i class="fas fa-envelope"></i> info@ecowaste.id</li>
                        <li><i class="fas fa-map-marker-alt"></i> Kasihan, Yogyakarta</li>
                    </ul>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} EcoWaste. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>