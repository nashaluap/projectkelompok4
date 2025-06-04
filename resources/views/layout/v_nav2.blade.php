<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hanna Catering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('boostrap2/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('boostrap2/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('boostrap2/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('boostrap2/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('boostrap2/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('boostrap2/css/style.css') }}" rel="stylesheet">

    <!-- Optional: tema dark -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_orange.css">
</head>

<!-- Navbar & Hero Start -->
<body>
<div class="container-xxl bg-white p-0">
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand d-flex align-items-center p-0">
            <h1 class="text-primary mb-03 "><i class="fa fa-gift me-3"></i>Hanna Catering</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto py-0 pe-4 align-items-center">
                <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active text-warning' : '' }}" style="text-align: center"><br>Beranda</a>
                <a href="/menuhanna" class="nav-item nav-link {{ Request::is('menuhanna') ? 'active text-warning' : '' }}" style="text-align: center"><br>Menu</a>
                <a href="/abouthanna" class="nav-item nav-link {{ Request::is('abouthanna') ? 'active text-warning' : '' }}" style="text-align: center"><br>Tentang Hanna Catering</a>
                <a href="/testimoni" class="nav-item nav-link {{ Request::is('testimoni') ? 'active text-warning' : '' }}" style="text-align: center"><br>Testimoni</a>

                  @auth
                    <a href="{{ route('dashboard.pelanggan.pesanan') }}" 
                    class="nav-item nav-link {{ Request::is('dashboard/pelanggan/pesanan') ? 'active text-warning' : '' }}" 
                    style="text-align: center"><br>Pesanan Saya</a>
                @endauth
            
                <div class="d-flex align-items-center ms-3 gap-3">
                {{-- Keranjang --}}
                <div class="position-relative me-3">
                    <a href="{{ route('viewCart') }}">
                        <i class="fas fa-shopping-cart fa-lg text-warning"></i>
                    </a>
                    @if ($cartCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem; padding: 4px 6px;">
                            {{ $cartCount }}
                        </span>
                    @endif
                </div>

                {{-- Notifikasi (hanya untuk yang login) --}}
                @auth
                    <div class="position-relative me-3">
                        <a href="{{ route('chat.user') }}">
                            <i class="fas fa-comments fa-lg text-warning"></i>
                        </a>
                         @if (isset($pesanBaru) && $pesanBaru > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.6rem; padding: 4px 6px;">
                            {{ $pesanBaru }}
                        </span>
                        @endif
                    </div>
                @endauth

                {{-- Notifikasi --}}
                @auth
                    <div>
                        <a href="/notifikasi" class="text-warning">
                            <i class="fas fa-bell fa-lg"></i>
                        </a>
                    </div>
                @endauth

                {{-- Login/Logout --}}
                @guest
                    <a href="/login" class="btn btn-warning text-dark py-1 px-3">LOGIN</a>
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger py-1 px-3">LOGOUT</button>
                    </form>
                @endauth
            </div>
        </ul>
    </div>
</nav>
</div>
<div class="container-xxl py-5 bg-dark hanna-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
        </div>
    </div>
</div>
</div>

 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('boostrap2/lib/wow/wow.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/easing/easing.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/waypoints/waypoints.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/counterup/counterup.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/owlcarousel/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/tempusdominus/js/moment.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
 <script src="{{ asset('boostrap2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

 <!-- Template Javascript -->
 <script src="{{ asset('boostrap2/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('boostrap2/js/main.js') }}"></script>
</body>
