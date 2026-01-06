<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'EcoWaste')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


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

        .glow-soft {
            transition: all 0.3s ease;
        }

        .glow-organik:hover {
            box-shadow: 
                0 0 0 2px #22c55e,
                0 10px 30px rgba(34, 197, 94, 0.45);
            transform: translateY(-8px);
        }

        .glow-anorganik:hover {
            box-shadow: 
                0 0 0 2px #3b82f6,
                0 10px 30px rgba(59, 130, 246, 0.45);
            transform: translateY(-8px);
        }

        .glow-b3:hover {
            box-shadow: 
                0 0 0 2px #ef4444,
                0 10px 30px rgba(239, 68, 68, 0.45);
            transform: translateY(-8px);
        }
        .kategori-wrapper {
            max-width: 1100px;
            padding: 20px;
        }

        .kategori-card {
            width: 100%;
            max-width: 320px; 
            padding: 24px;
            text-align: center;
        }


    </style>

    <style>
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

        .footer-list li a {
            margin-bottom: 8px;
            text-decoration: none;
            font-size: 14px;
            color: #cbd5f5;
        }

        .footer-list li:hover {
            color: #22c55e;
            cursor: pointer;
        }

        .footer-list li a:hover {
            color: #22c55e;
            cursor: pointer;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 14px;
            color: #cbd5f5;
        }

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
        <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar Sticky */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745 !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            font-size: 2rem;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #333;
            margin: 0 15px;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #28a745 !important;
            border-bottom: 2px solid #28a745;
        }

        .btn-login {
            border: 2px solid #28a745;
            color: #28a745;
            padding: 8px 25px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #28a745;
            color: white;
        } */

        /* Hero Section */
        .hero-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            color: #212529;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .btn-jual {
            background-color: #28a745;
            color: white;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-jual:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        }

        /* Stats Card */
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            height: 100%;
        }

        .stats-title {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #212529;
        }

        .stats-subtitle {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Section */
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 50px;
            color: #212529;
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        .product-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .product-icon i {
            font-size: 2.5rem;
            color: #2196F3;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #212529;
        }

        .product-price-label {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #28a745;
        }

        /* Footer */
        .footer {
            background-color: #212529;
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }

        .footer-title {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #28a745;
        }

        .footer-bottom {
            border-top: 1px solid #495057;
            margin-top: 40px;
            padding-top: 20px;
            text-align: center;
            color: #adb5bd;
        }

        .keuntungan-section {
            padding: 80px 0;
            background-color: white;
        }

        .keuntungan-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            transition: all 0.3s;
        }

        .keuntungan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .keuntungan-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .keuntungan-icon i {
            font-size: 2rem;
            color: #29cf55ff;
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
