<?php $__env->startSection('title'); ?>
Chat
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
Halaman Chat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Chat dengan <?php echo e($pelanggan->nama_pelanggan); ?></h2>

    <div class="card shadow mb-4">
        <div class="card-body" style="height: 400px; overflow-y: auto;" id="chat-box">
            <?php $__currentLoopData = $chat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-2 <?php echo e($c->pengirim == 'admin' ? 'text-right' : 'text-left'); ?>">
                    <strong><?php echo e(ucfirst($c->pengirim)); ?>:</strong>
                    <p class="mb-0"><?php echo e($c->pesan); ?></p>
                    <small class="text-muted"><?php echo e($c->created_at->format('H:i')); ?></small>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <form action="<?php echo e(route('chat.kirim')); ?>" method="POST" class="card-footer d-flex">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="pengirim" value="pelanggan">
            <input type="text" name="pesan" class="form-control mr-2" placeholder="Ketik pesan..." required>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_chat.blade.php ENDPATH**/ ?>