<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'EcoWaste')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>


    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-stat {
            background: #ecfdf3;
            border: none;
            border-radius: 12px;
        }
        .text-green {
            color: #22c55e;
        }
        .nav-link.active {
            border-bottom: 2px solid #22c55e;
            font-weight: 600;
        }
        /* TRANSISI DASAR */
        .glow-soft {
            transition: all 0.3s ease;
        }

        /* ORGANIK */
        .glow-organik:hover {
            box-shadow: 
                0 0 0 2px #22c55e,
                0 10px 30px rgba(34, 197, 94, 0.45);
            transform: translateY(-8px);
        }

        /* ANORGANIK */
        .glow-anorganik:hover {
            box-shadow: 
                0 0 0 2px #3b82f6,
                0 10px 30px rgba(59, 130, 246, 0.45);
            transform: translateY(-8px);
        }

        /* B3 */
        .glow-b3:hover {
            box-shadow: 
                0 0 0 2px #ef4444,
                0 10px 30px rgba(239, 68, 68, 0.45);
            transform: translateY(-8px);
        }
        /* WRAPPER AGAR PERSIS TENGAH */
        .kategori-wrapper {
            max-width: 1100px; /* ini kunci biar mirip Figma */
        }

        /* CARD KATEGORI */
        .kategori-card {
            width: 100%;
            max-width: 320px; /* ukuran kartu ala Figma */
            padding: 24px;
            text-align: center;
        }


    </style>

    <style>
    /* FOOTER DARK STYLE */
        .footer-dark {
            background: linear-gradient(180deg, #0f172a, #020617);
            color: #e5e7eb;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 16px;
            color: #ffffff;
        }

        .footer-text {
            font-size: 14px;
            line-height: 1.7;
            color: #cbd5f5;
        }

        .footer-list {
            list-style: none;
            padding: 0;
        }

        .footer-list li {
            margin-bottom: 8px;
            font-size: 14px;
            color: #cbd5f5;
        }

        .footer-list li:hover {
            color: #22c55e;
            cursor: pointer;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 14px;
            color: #cbd5f5;
        }

        /* SOCIAL ICON */
        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        .social-icon:hover {
            background: #22c55e;
            color: #ffffff;
        }
        </style>


    @stack('styles')
</head>
<body>

@include('layouts.navbar')

<div class="container mt-5">
    @yield('content')
</div>

@include('layouts.footer')

@stack('scripts')
</body>
</html>
