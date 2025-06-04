<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hanna Catering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo e(asset('boostrap2/img/favicon.ico')); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('boostrap2/lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('boostrap2/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('boostrap2/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('boostrap2/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('boostrap2/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom2.css')); ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php echo $__env->make('layout/v_nav2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End of Sidebar -->

            <!-- Main Content -->
            <div id="content">
               
                <!-- Begin Page Content -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        
        </div>
        <!-- End of Main Content -->

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
</body><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/layout/v_template2.blade.php ENDPATH**/ ?>