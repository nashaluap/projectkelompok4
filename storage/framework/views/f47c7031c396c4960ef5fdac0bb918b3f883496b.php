
<?php $__env->startSection('content'); ?>
<h3>Riwayat Pesanan Saya</h3>

<?php if($pesanan->isEmpty()): ?>
    <p>Belum ada riwayat pesanan.</p>
<?php else: ?>
<table class="table">
    <thead>
        <tr>
            <th>ID Pesanan</th>
            <th>Tanggal Pesan</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($p->id_pesanan); ?></td>
            <td><?php echo e(\Carbon\Carbon::parse($p->tanggal_pesanan)->format('d-m-Y')); ?></td>
            <td><?php echo e($p->status); ?></td>
            <td>Rp <?php echo e(number_format($p->total_harga, 0, ',', '.')); ?></td>
            <td>
                <a href="<?php echo e(route('riwayat.pesanan.detail', $p->id_pesanan)); ?>" class="btn btn-sm btn-primary">Detail</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/pelanggan/v_riwayat.blade.php ENDPATH**/ ?>