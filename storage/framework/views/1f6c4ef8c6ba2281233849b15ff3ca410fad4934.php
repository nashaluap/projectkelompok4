
<?php $__env->startSection('content'); ?>

<h3>Detail Pesanan: <?php echo e($pesanan->id_pesanan); ?></h3>

<table class="table table-bordered">
    <tr>
        <th>ID Pesanan</th>
        <td><?php echo e($pesanan->id_pesanan); ?></td>
    </tr>
    <tr>
        <th>Tanggal Pesanan</th>
        <td><?php echo e(\Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d-m-Y')); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo e(ucfirst($pesanan->status)); ?></td>
    </tr>
    <tr>
        <th>Total Harga</th>
        <td>Rp <?php echo e(number_format($pesanan->total_harga, 0, ',', '.')); ?></td>
    </tr>
    <tr>
        <th>Nama Pemesan</th>
        <td><?php echo e($pesanan->nama_pemesan); ?></td>
    </tr>
    <tr>
        <th>No. WhatsApp</th>
        <td><?php echo e($pesanan->no_wa); ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?php echo e($pesanan->alamat); ?></td>
    </tr>
    <tr>
        <th>Catatan</th>
        <td><?php echo e($pesanan->catatan ?? '-'); ?></td>
    </tr>
</table>

<a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary">Kembali</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/pelanggan/v_detailpesanan.blade.php ENDPATH**/ ?>