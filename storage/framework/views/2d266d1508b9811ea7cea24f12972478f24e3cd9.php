
<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h2 class="mb-4">Keranjang Belanja</h2>

    <?php if(count($cart) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->menu): ?> 
                    <?php $total += $item->quantity * $item->menu->harga; ?>
                    <tr>
                        <td><img src="<?php echo e(asset('foto_menu/'.$item->menu->foto_menu)); ?>" width="80"></td>
                        <td><?php echo e($item->menu->nama_menu ?? '-'); ?></td>
                        <td>Rp <?php echo e(number_format($item->menu->harga) ?? 0); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td>Rp <?php echo e(number_format($item->quantity * $item->menu->harga)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $item->menu->id_menu)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Menu belum ditambahkan.</td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                    <td><strong>Rp<?php echo e(number_format($total, 0, ',', '.')); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end gap-3">
            <a href="<?php echo e(route('menuUser')); ?>" class="btn btn-secondary">Lanjut Belanja</a>
            <a href="<?php echo e(route('pemesanan')); ?>" class="btn btn-primary">Checkout</a>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            Keranjang masih kosong. Yuk <a href="<?php echo e(route('menuUser')); ?>">belanja dulu</a>!
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_cart.blade.php ENDPATH**/ ?>