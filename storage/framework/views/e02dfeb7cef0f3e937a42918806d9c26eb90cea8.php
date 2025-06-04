<?php $__env->startSection('title'); ?>
Chat
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
Halaman Chat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Daftar Pelanggan</h2>
    <ul>
        <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($p->nama_pelanggan); ?>

                <a href="<?php echo e(url('/chatadmin/' . $p->id_pelanggan)); ?>">Chat</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_chat_daftar_pelanggan.blade.php ENDPATH**/ ?>