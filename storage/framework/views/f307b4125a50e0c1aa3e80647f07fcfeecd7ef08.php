<?php $__env->startSection('content'); ?>
<div class="container mt-5">

    <form method="GET" action="<?php echo e(route('menuUser')); ?>" class="mb-4 row g-3 align-items-end">
    <div class="col-md-4">
        <input type="text" name="keyword" placeholder="Cari menu..." value="<?php echo e(request('keyword')); ?>" class="form-control">
    </div>

    <div class="col-md-3">
        <select name="sort" class="form-select" onchange="this.form.submit()">
            <option value="">-- Urutkan --</option>
            <option value="nama" <?php echo e(request('sort') == 'nama' ? 'selected' : ''); ?>>Nama Menu (A-Z)</option>
        </select>
    </div>

    <div class="col-md-3">
        <select name="kategori" class="form-select" onchange="this.form.submit()">
            <option value="">-- Pilih Kategori --</option>
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k->id_paket); ?>" <?php echo e(request('kategori') == $k->id_paket ? 'selected' : ''); ?>>
                    <?php echo e($k->paket); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
    </div>
</form>

<div style="text-align: center; margin: 20px;">
    <h2 class="text-center text-darkorange mt-5 mb-4" style="color: darkorange;">Menu Kami</h2>
  <div style="margin: 20px;">

    <div class="row gy-4 justify-content=center">
    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="card h-100">
            <img src="<?php echo e(url('foto_menu/' . $m->foto_menu)); ?>" class="card-img-top" alt="<?php echo e($m->nama_menu); ?>">
            <div class="card-body text-center d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title"><?php echo e($m->nama_menu); ?></h5>
                    <p class="card-text"><?php echo e($m->deskripsi); ?></p>
                    <p class="text-muted mb-1">Kategori: <?php echo e($m->nama_paket); ?></p>
                    <p class="card-text"><strong>Harga:</strong> Rp<?php echo e(number_format($m->harga, 0, ',', '.')); ?></p>
                </div>
                <div class="mt-3">
                    <a href="<?php echo e(route('menu.detail', $m->id_menu)); ?>" class="btn btn-add">View Details</a>
                </div>
                <form action="<?php echo e(route('menu.addToCart', $m->id_menu)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="quantity">Jumlah:</label>
                        <input type="number"
                               name="quantity"
                               id="quantity"
                               value="1"
                               min="1"
                               class="form-control"
                               style="width: 100px;">
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-add">Tambah ke Keranjang</button>    
                </form>
            </div>

            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_menuhanna.blade.php ENDPATH**/ ?>