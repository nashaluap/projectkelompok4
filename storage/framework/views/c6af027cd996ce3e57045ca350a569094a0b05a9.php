
<?php $__env->startSection('content'); ?>

<style>
    body {
        background: url('https://images.unsplash.com/photo-1606788075763-0b6183be3f5e') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        font-family: 'Nunito', sans-serif;
        color: #fff;
    }
    .chat-container {
        background-color: rgba(88, 50, 14, 0.9); /* coklat gelap transparan */
        max-width: 600px;
        margin: 40px auto;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        padding: 20px;
        display: flex;
        flex-direction: column;
        height: 80vh;
    }
    .chat-header {
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 15px;
        text-align: center;
    }
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding-right: 10px;
        margin-bottom: 15px;
    }
    .message {
        max-width: 70%;
        margin-bottom: 12px;
        padding: 10px 15px;
        border-radius: 15px;
        font-size: 15px;
        line-height: 1.3;
        word-wrap: break-word;
    }
    .message.user {
        background-color: #d4af37; /* emas */
        color: #333;
        align-self: flex-end;
        border-bottom-right-radius: 0;
    }
    .message.admin {
        background-color: #fff;
        color: #58320e;
        align-self: flex-start;
        border-bottom-left-radius: 0;
    }
    .chat-input {
        display: flex;
        gap: 10px;
    }
    .chat-input textarea {
        flex: 1;
        border-radius: 10px;
        border: none;
        padding: 10px;
        font-size: 14px;
        resize: none;
        font-family: 'Nunito', sans-serif;
    }
    .chat-input button {
        background-color: #d4af37;
        color: #333;
        border: none;
        padding: 10px 20px;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .chat-input button:hover {
        background-color: #c29e2e;
    }
</style>

<div class="chat-container">
    <div class="chat-header">
        Chat dengan Admin
    </div>

    <div class="chat-messages" id="chatMessages">
        <?php $__empty_1 = true; $__currentLoopData = $chat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="message <?php echo e($msg->pengirim == 'pelanggan' ? 'user' : 'admin'); ?>">
                <?php echo e($msg->pesan); ?>

               <div style="font-size: 10px; margin-top: 5px; text-align: right; opacity: 0.7;">
                <?php if($msg->created_at->isToday()): ?>
                    <?php echo e($msg->created_at->format('H:i')); ?>

                <?php else: ?>
                    <?php echo e($msg->created_at->format('d M Y H:i')); ?>

                <?php endif; ?>
            </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Tidak ada pesan.</p>
        <?php endif; ?>
    </div>

    <form action="<?php echo e(route('chat.kirim')); ?>" method="POST" class="chat-input">
        <?php echo csrf_field(); ?>
        <textarea name="pesan" rows="2" placeholder="Ketik pesan..." required></textarea>
        <input type="hidden" name="pengirim" value="pelanggan">
        <button type="submit">Kirim</button>
    </form>
</div>

<script>
    // Auto scroll ke bawah tiap load page
    const chatMessages = document.getElementById('chatMessages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nashalu-project2\resources\views/v_chathanna.blade.php ENDPATH**/ ?>