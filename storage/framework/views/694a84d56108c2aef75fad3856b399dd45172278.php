
<?php $__env->startSection('content'); ?>

    <!-- About Start -->
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo e(asset('boostrap2/img/about-1.jpg')); ?>">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?php echo e(asset('boostrap2/img/about-2.jpg')); ?>" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="<?php echo e(asset('boostrap2/img/about-3.jpg')); ?>">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="<?php echo e(asset('boostrap2/img/about-4.jpg')); ?>">
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
                    </div>

                    <!-- Maps Start -->
                    <div class="container my-5">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Lokasi Kami</h5>
                        <div style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.631582343934!2d107.6239498147732!3d-6.568835795338876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693c7c50682cdd%3A0xeec439a97addc0b6!2sHanna%20Cakes!5e0!3m2!1sen!2sid!4v1685731700000!5m2!1sen!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0; position:absolute; top:0; left:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <!-- Maps End -->


                </div>
            </div>
        </div>
    </div>
        <!-- About End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_abouthanna.blade.php ENDPATH**/ ?>