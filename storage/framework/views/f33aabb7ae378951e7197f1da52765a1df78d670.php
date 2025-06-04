
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <h3 class="mb-4">Notifikasi Anda</h3>
    <?php $__empty_1 = true; $__currentLoopData = $notifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="p-3 mb-2 bg-light border rounded">
            <strong><?php echo e($notif->judul); ?></strong>
            <p><?php echo e($notif->pesan); ?></p>
            <small class="text-muted"><?php echo e($notif->created_at->diffForHumans()); ?></small>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>Tidak ada notifikasi.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_notifikasi.blade.php ENDPATH**/ ?>