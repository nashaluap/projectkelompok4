
<?php $__env->startSection('content'); ?>

 <div class="container mt-5">
        <h1 class="mb-4" style="color: orange; font-weight: bold;"> Selamat datang, <?php echo e($user->name); ?>!</h1>
        <ul>
            <?php $__empty_1 = true; $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($item->nama_paket); ?> - Status: <?php echo e($item->status); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </ul>
    </div>
       <h3 class="mb-4 text-center">Riwayat Pemesanan Anda</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesanan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($p->created_at)->format('d M Y')); ?></td>
                            <td>Rp<?php echo e(number_format($p->total_harga, 0, ',', '.')); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($p->status == 'Selesai' ? 'success' : ($p->status == 'Diproses' ? 'warning' : 'secondary')); ?>">
                                    <?php echo e($p->status); ?>

                                </span>
                            </td>
                            <td>
                                <a href="<?php echo e(route('dashboard.pelanggan.detail', $p->id_pesanan)); ?>" class="btn btn-sm btn-primary">Lihat</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada pesanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/pelanggan/v_dashboard.blade.php ENDPATH**/ ?>