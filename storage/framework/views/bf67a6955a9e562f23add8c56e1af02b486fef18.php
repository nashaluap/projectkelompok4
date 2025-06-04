
<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Form Pembayaran</h2>

    <p>Total Pesanan: <strong>Rp <?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></strong></p>

    <form action="<?php echo e(route('pembayaran.simpan')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="pesanan_id" value="<?php echo e($pesanan->id); ?>">

        <div class="mb-3">
            <label>Tipe Pembayaran</label><br>
            <input type="radio" name="tipe_pembayaran" value="DP" required> DP (20% minimal)<br>
            <input type="radio" name="tipe_pembayaran" value="Lunas" required> Lunas
        </div>

        <div class="mb-3">
            <label>Nominal Pembayaran</label>
            <input type="number" name="nominal" class="form-control" required>
            <?php $__errorArgs = ['nominal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary">Bayar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_pembayaran.blade.php ENDPATH**/ ?>