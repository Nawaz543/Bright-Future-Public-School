<link rel="stylesheet" href="<?= base_url('css/Backend/contactMessage.css') ?>">
<div class="messages-container">
    <!-- Example Message Card -->
    <?php foreach ($messages as $msg): ?>
    <div class="message-card">
        
        <div class="msg-header">
            <div>
                <h3><?= esc($msg['name']) ?></h3>
                <p class="email"><?= esc($msg['email']) ?></p>
                <p class="phone"><?= esc($msg['phone']) ?></p>
            </div>

            <div class="actions">
                <form action="<?=  base_url('/contact/markRead/'.$msg['id']) ?>" method="post">
                    <button class="btn read-btn">
                        <?= $msg['is_read'] ? '✔ Read' : 'Mark as Read' ?>
                    </button>
                </form>

                <form action="<?=  base_url('contact/delete/'.$msg['id']) ?>" method="post" onsubmit="return confirm('Delete this message?')">
                    <button class="btn delete-btn">🗑 Delete</button>
                </form>
            </div>
        </div>

        <p class="message-text">
            <?= esc($msg['message']) ?>
        </p>

        <p class="time">📅 <?= $msg['created_at'] ?></p>

    </div>
    <?php endforeach; ?>

</div>
