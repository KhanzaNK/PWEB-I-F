<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'EcoWaste') - Laravel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --brand-green: #10B981;
            --muted-gray: #f3f4f6;
            --text-default: #0f172a;
            --card-border: rgba(15,23,42,0.06);
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            color: var(--text-default);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(0,0,0,0.02);
            box-shadow: none;
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1050;
            transition: box-shadow 200ms ease, padding 200ms ease, backdrop-filter 200ms ease;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .navbar.is-sticky {
            box-shadow: 0 6px 20px rgba(2,6,23,0.08);
            padding: 0.45rem 0;
            background-color: rgba(255,255,255,0.7);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text-default) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .container {
            max-width: 1200px;
        }

        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-center .nav-link {
            color: #111827;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }

        .nav-center .nav-link.active {
            color: var(--brand-green);
            border-bottom: 3px solid var(--brand-green);
            border-radius: 0;
            padding-bottom: 0.5rem;
        }

        .login-btn {
            border: 1px solid var(--brand-green);
            color: var(--brand-green);
            border-radius: 8px;
            padding: 0.4rem 0.9rem;
            font-weight: 600;
            background: transparent;
        }

        .login-btn:hover {
            background: rgba(16,185,129,0.06);
        }

        footer {
            background-color: #071126; /* deep navy */
            color: #cbd5e1;
            padding: 3.5rem 0;
            margin-top: 3rem;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2.5rem;
        }

        .footer h5 {
            color: #ffffff;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .footer p, .footer a, .footer li {
            color: #9aa6b8;
            font-size: 0.92rem;
            line-height: 1.8;
            margin: 0;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
            color: #e6eef8;
            margin-right: 0.5rem;
        }

        .footer-bottom {
            margin-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.03);
            padding-top: 1.25rem;
            color: #8b97a8;
            font-size: 0.85rem;
            text-align: center;
        }
    </style>

    @yield('css')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 3v6h6" stroke="var(--brand-green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 21v-6h-6" stroke="var(--brand-green)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                EcoWaste
            </a>

            <div class="nav-center">
                <ul class="navbar-nav d-flex flex-row align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('jual.form') }}">JUAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">TOKO</a>
                    </li>
                </ul>
            </div>

            <div class="ms-auto d-flex align-items-center">
                <a href="#" class="btn login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div>
                <h5>Tentang Kami</h5>
                <p>Platform pengelolaan sampah yang membantu masyarakat untuk menjual sampah dan berkontribusi pada lingkungan yang lebih bersih.</p>
            </div>

            <div>
                <h5>Layanan</h5>
                <ul style="list-style:none;padding:0;margin:0">
                    <li>Jual Sampah</li>
                    <li>Toko Daur Ulang</li>
                    <li>Informasi Sampah</li>
                    <li>Edukasi</li>
                </ul>
            </div>

            <div>
                <h5>Kontak</h5>
                <p>+62 858-9210-0132</p>
                <p>info@ecowaste.id</p>
                <p>Sleman, Indonesia</p>
            </div>

            <div>
                <h5>Ikuti Kami</h5>
                <div style="display:flex;align-items:center">
                    <a class="social-btn" href="https://www.instagram.com/ecowaste.co/"><i class="fab fa-instagram"></i></a>
                    <a class="social-btn" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="social-btn" href=""><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">&copy; 2026 EcoWaste - Platform Jual Beli Sampah & Produk Ramah Lingkungan</div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // toggle sticky class for navbar when scrolling
        (function () {
            var nav = document.querySelector('.navbar');
            if (!nav) return;
            function onScroll() {
                if (window.scrollY > 20) nav.classList.add('is-sticky'); else nav.classList.remove('is-sticky');
            }
            document.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        })();
    </script>

    @yield('js')
</body>
</html>
