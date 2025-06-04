
<?php $__env->startSection('content'); ?>

<style>
    body {
        background: url('/images/bg-blur.jpg') no-repeat center center fixed;
        background-size: cover;
        backdrop-filter: blur(5px);
    }
</style>

<div class="container mx-auto max-w-4xl p-6">
    <div class="bg-[#4e2c0c] text-white shadow-xl rounded-2xl p-8">
        <h2 class="text-3xl font-bold mb-6 text-center">Checkout Pemesanan</h2>

        <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php
        $minDate = \Carbon\Carbon::now()->addDays(2)->format('Y-m-d');
        ?>

        <form action="<?php echo e(route('submitPemesanan')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold mb-1">Nama Pemesan</label>
                        <input type="text" name="nama_pemesan"
                            class="w-full border rounded-lg px-4 py-2 text-black focus:outline-none focus:ring focus:border-yellow-400"
                            required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Nomor WhatsApp</label>
                        <input type="text" name="no_wa"
                            class="w-full border rounded-lg px-4 py-2 text-black focus:outline-none focus:ring focus:border-yellow-400"
                            required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Tanggal Pengambilan</label>
                        <input type="date" name="tgl_pesanan"
                        class="w-full border rounded-lg px-4 py-2 text-black focus:outline-none focus:ring focus:border-yellow-400"
                        min="<?php echo e($minDate); ?>" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Jam Pengambilan</label>
                        <input type="time" name="waktu_pengambilan"
                            class="w-full border rounded-lg px-4 py-2 text-black focus:outline-none focus:ring focus:border-yellow-400"
                            required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Alamat Pengantaran</label>
                        <textarea name="alamat" rows="3"
                            class="w-full border rounded-lg px-4 py-2 text-black focus:outline-none focus:ring focus:border-yellow-400"></textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Catatan Tambahan (Opsional)</label>
                        <textarea name="catatan" rows="2"
                            class="w-full border rounded-lg px-4 py-2 text-black focus:outline-none focus:ring focus:border-yellow-400"></textarea>
                    </div>
                </div>

                
                <div class="bg-white text-black shadow-inner rounded-xl p-6 overflow-x-auto">
                    <h3 class="text-2xl font-bold mb-4">Ringkasan Pesanan</h3>

                    <?php if(count($cart) > 0): ?>
                    <table class="w-full text-sm text-left border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-3 border text-center">Nama Menu</th>
                                <th class="py-2 px-3 border text-center">Qty</th>
                                <th class="py-2 px-3 border text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                                $subtotal = $item->harga * $item->quantity; 
                                $total += $subtotal; 
                            ?>
                            <tr class="font-bold bg-gray-100" style="color: #4e2c0c;">
                                <td class="py-2 px-3 border"><?php echo e($item->nama_menu); ?></td>
                                <td class="py-2 px-3 border text-center"><?php echo e($item->quantity); ?></td>
                                <td class="py-2 px-3 border">Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="font-bold bg-gray-100" style="color: #4e2c0c;">
                                <td class="py-2 px-3 border text-center" colspan="2">Total</td>
                                <td class="py-2 px-3 border">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p style="color: rgb(101, 73, 41); font-weight: 600;">Keranjang masih kosong 😢</p>
                    <?php endif; ?>

                    
                    <div class="mt-6">
                        <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-6 py-3 rounded-lg w-full transition duration-300">
                            Lanjut Konfirmasi
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_pemesanan.blade.php ENDPATH**/ ?>