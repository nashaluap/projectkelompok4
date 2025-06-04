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
    <link href="{{ asset('css/custom2.css') }}" rel="stylesheet">

    <!-- Optional: tema dark -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_orange.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand d-flex align-items-center p-0">
                    <h1 class="text-primary mb-03 "><i class="fa fa-gift me-3"></i>Hanna Catering</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="/index" class="nav-item nav-link active"><br>Beranda</a>
                        <a href="/menuhanna" class="nav-item nav-link {{ Request::is('menuhanna') ? 'active' : '' }}" style="text-align: center"><br>Menu</a>
                        <a href="/abouthanna" class="nav-item nav-link {{ Request::is('abouthanna') ? 'active' : '' }}" style="text-align: center"><br>Tentang Hanna Catering</a>
                        <a href="/testimoni" class="nav-item nav-link {{ Request::is('testimoni') ? 'active' : '' }}" style="text-align: center"><br>Testimoni</a>
                  <div class="d-flex align-items-center ms-3 gap-3">
                    <a href="/cart" class="position-relative">
                    <i class="fas fa-shopping-cart fa-lg text-warning"></i>
                    @if ($cartCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem; padding: 4px 6px;">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
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
            </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hanna-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Nikmati<br>Menu Catering Lezat Kami</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">Kue Basah, Kue Nampan, Snack Box, Kue Tampah, Tumpeng dan Nasi Box</p>
                            <a href="/pemesanan" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Pesan Menu Catering</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="{{ asset('boostrap2/img/hanna1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Harga Terjangkau</h5>
                                <p>Tetap kenyang, Ramah di dompet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p>Bahan Pilihan, Rasa Istimewa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p>Tinggal Klik, Catering siap diantarkan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 Service</h5>
                                <p>Siap Melayani Kapan Saja.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('boostrap2/img/about-1.jpg') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('boostrap2/img/about-2.jpg') }}" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/about-3.jpg') }}">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('boostrap2/img/about-4.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Tentang Kami</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-gift text-primary me-2"></i>Hanna Catering</h1>
                        <p class="mb-4" style="text-align: justify">Hanna Catering hadir untuk jadi solusi praktis bagi kamu yang ingin pesan makanan enak tanpa ribet untuk acara keluarga, ulang tahun, seminar, acara-acara besar sampai kebutuhan kantor, semua bisa diatur!</p>
                        <p class="mb-4" style="text-align: justify">Kami percaya makanan bukan cuma soal rasa, tapi juga soal pelayanan. Maka dari itu, kami siap melayani 24/7, bisa pesan online, dan pastinya dengan harga yang terjangkau.
                            Dengan bahan berkualitas dan tim dapur berpengalaman, kami pastikan setiap sajian dari Hanna Catering selalu fresh, lezat, dan memuaskan. Yuk, nikmati hidangan terbaik dari kami kapanpun kamu butuh!</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Tahun</p>
                                        <h6 class="text-uppercase mb-0">Pengalaman</h6>
                                    </div>
                                </div>
                            </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <div class="text-center">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/about-3.jpg') }}"><br>
                                <br><h5>Kue Basah</h5>
                                <p class="mb-4" style="text-align: justify">Kue tradisional yang lembut, gurih, dan legit, cocok untuk camilan atau suguhan tamu.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <div class="text-center">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/snackbox.jpg') }}"><br>
                                <br><h5>Snack Box</h5>
                                <p class="mb-4" style="text-align: justify">Aneka paket snack box berisi cemilan, cocok untuk berbagai acara.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <div class="text-center">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/nampan.jpg') }}"><br>
                                <br><h5>Kue Nampan</h5>
                                <p class="mb-4" style="text-align: justify">Kumpulan kue basah atau kering yang disusun dalam satu nampan, cocok untuk acara keluarga atau syukuran.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center gy-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <div class="text-center"> 
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/tampan.jpg') }}"><br>
                                <br><h5>Kue Tampah</h5>
                                <p class="mb-4" style="text-align: justify">Disajikan ditampah bambu dengan hiasan daun pisang, cocok untuk arisan, lamaran, dan acara adat.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <div class="text-center">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/tumpeng.jpg') }}"><br>
                                <br><h5>Tumpeng</h5>
                                <p class="mb-4" style="text-align: justify">Nasi kuning berbentuk kerucut lengkap dengan lauk pauk khas, cocok untuk perayaan dan syukuran.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <div class="text-center">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('boostrap2/img/nasibox.jpg') }}"><br>
                                <br><h5>Nasi Box</h5>
                                <p class="mb-4" style="text-align: justify">Paket nasi dengan berbagai menu yang disediakan, cocok untuk segala jenis acara.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimoni</h5>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Menu Catring disini murah dan enak-enak makanannya</p>
                        <div class="mb-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star-half-alt text-warning"></i>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('boostrap2/img/testimonial-1.jpg') }}" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Zahra Fatimah</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Testimonial End -->
        

 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Informasi</h4>
                <a class="btn btn-link" href="">Tentang Kami</a>
                <a class="btn btn-link" href="">Pemesanan</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Hubungi Kami</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Subang, Jawa Barat</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0813-1211-3389 (ADMIN) </p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>hannaofficial@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Buka</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Offline Store <br>
                Ki Hajar Dewantara no.19 Tegal Kalapa Subang, Subang Jawa Barat, Indonesia</p>
                <h5 class="text-light fw-normal">Senin - Minggu</h5>
                <p>08.00 - 22.00 WIB</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span> &copy; Hanna Official. All Right Reserved</span>
            </div>
        </div>
</div>
<!-- Footer End -->

        <!-- Back to Top -->
    <div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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

</html>