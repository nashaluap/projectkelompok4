<?php $__env->startSection('title'); ?>
Pesanan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
Halaman Pesanan
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pesanan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <?php if(session('pesan')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success</h5>
                    <?php echo e(session('pesan')); ?>

                </div>
            <?php endif; ?>
            <thead>
                <tr>
                <th>No</th>
                <th>Id Pesanan</th>
                <th>Pelanggan</th>
                <th>Menu yang di Pesan</th>
                <th>Catatan</th>
                <th>Tanggal Pesanan</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>Total Harga</th>
                <th>Total pesanan</th>
                <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                // Jika menu ada lebih dari satu, gabungkan nama menu dengan koma
                $menu = DB::table('tb_pesanan_menu')
                            ->join('tb_menu', 'tb_pesanan_menu.id_menu', '=', 'tb_menu.id_menu')
                            ->where('tb_pesanan_menu.id_pesanan', $data->id_pesanan)
                            ->pluck('tb_menu.nama_menu')
                            ->toArray();
                $menuList = implode(', ', $menu); // Menggabungkan menu dengan koma
            ?>
                <tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($data->id_pesanan); ?></td>
                <td><?php echo e($data->nama_pemesan); ?></td>
                <td><?php echo e($menuList); ?></td>
                <td><?php echo e($data->catatan); ?></td>
                <td><?php echo e($data->tgl_pesanan); ?></td>
                <td><?php echo e($data->status); ?></td>
                <td><?php echo e($data->alamat); ?></td>
                <td><?php echo e($data->total_harga); ?></td>
                <td><?php echo e($data->total_pesanan); ?></td>
                    <td>
                        <a href="/pesanan/detail/<?php echo e($data->id_pesanan); ?>" class="btn btn-detail btn-action">Detail</a>
                        <form action="<?php echo e(route('ubahStatusPesanan', $data->id_pesanan)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="status" onchange="this.form.submit()" class="form-control form-control-sm">
                                <option value="tertunda" <?php echo e($data->status == 'tertunda' ? 'selected' : ''); ?>>Tertunda</option>
                                <option value="diproses" <?php echo e($data->status == 'diproses' ? 'selected' : ''); ?>>Diproses</option>
                                <option value="selesai" <?php echo e($data->status == 'selesai' ? 'selected' : ''); ?>>Selesai</option>
                                <option value="dibatalkan" <?php echo e($data->status == 'dibatalkan' ? 'selected' : ''); ?>>Dibatalkan</option>
                            </select>
                        </form>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo e($data->id_pesanan); ?>">
                            Hapus
                          </button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="delete<?php echo e($data->id_pesanan); ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><?php echo e($data->id_pesanan); ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin menghapus data ini ?</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <a href="/pesanan/delete/<?php echo e($data->id_pesanan); ?>" class="btn btn-outline-light">Ya</a>
                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_pesanan.blade.php ENDPATH**/ ?>