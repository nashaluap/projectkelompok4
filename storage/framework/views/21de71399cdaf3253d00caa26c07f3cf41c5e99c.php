
<?php $__env->startSection('content'); ?>

<div class="container">
    <h1 class="text-2xl font-bold mb-4">Testimoni Pelanggan</h1>

     <!-- Menampilkan pesan sukses jika ada -->
     <?php if(session('success')): ?>
     <div class="alert alert-success mb-4">
         <?php echo e(session('success')); ?>

     </div>
 <?php endif; ?>

    <!-- Tombol Tambah Testimoni -->
    <a href="<?php echo e(route('testimoni.create')); ?>" class="btn btn-primary mb-4">
        Tambah Testimoni
    </a>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
        <?php $__empty_1 = true; $__currentLoopData = $testimoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="border rounded-lg p-4 bg-white shadow">
                <div class="text-sm text-gray-400 italic mb-2"></div>
                <p class="text-gray-700 mb-4"><?php echo e($item->ulasan); ?></p>
                
                <div class="flex items-center mb-2">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <?php if($i <= $item->rating): ?>
                            <span class="text-yellow-400 text-xl">★</span>
                        <?php else: ?>
                            <span class="text-gray-300 text-xl">☆</span>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                
                <div class="flex items-center">
                    <img src="/img/avatar.png" class="w-10 h-10 rounded-full mr-2" alt="avatar">
                    <strong class="text-gray-800"><?php echo e($item->pesanan->nama_pemesan ?? 'Pelanggan'); ?></strong>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-500">Belum ada testimoni.</p>
        <?php endif; ?>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_testimoni.blade.php ENDPATH**/ ?>