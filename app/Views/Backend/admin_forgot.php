<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Forgot Password</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        background: #0f172a;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 400px;
        background: #1e293b;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 0 30px rgba(0, 162, 255, 0.2);
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    h2 {
        color: #e2e8f0;
        text-align: center;
        margin-bottom: 10px;
        font-size: 24px;
    }

    .subtitle {
        text-align: center;
        color: #94a3b8;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group input {
        width: 100%;
        padding: 14px 15px;
        border-radius: 10px;
        border: 1px solid #334155;
        background: #0f172a;
        color: #e2e8f0;
        font-size: 14px;
        outline: none;
        transition: 0.25s;
    }

    .input-group input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 10px rgba(56, 189, 248, 0.4);
    }

    ::placeholder {
        color: #94a3b8;
    }

    .button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #0891b2, #0ea5e9);
        border: none;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .button:hover {
        background: linear-gradient(135deg, #0ea5e9, #38bdf8);
        transform: scale(1.02);
    }

    .msg {
        padding: 10px;
        text-align: center;
        margin-bottom: 15px;
        border-radius: 8px;
        font-size: 14px;
    }

    .error {
        background: rgba(255, 80, 80, 0.2);
        color: #ff7b7b;
    }

    .success {
        background: rgba(80, 255, 150, 0.15);
        color: #4ade80;
    }

    .back {
        text-align: center;
        margin-top: 15px;
    }

    .back a {
        color: #38bdf8;
        font-size: 13px;
        text-decoration: none;
    }

    .back a:hover {
        text-decoration: underline;
    }

    @media (max-width: 450px){
        .container {
            padding: 25px;
        }
    }
</style>

</head>
<body>

<div class="container">

    <h2>Forgot Password</h2>
    <p class="subtitle">Enter your email to receive reset link</p>

    <!-- Flash Messages -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="msg error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="msg success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('admin/send-reset-link') ?>">

        <div class="input-group">
            <input type="email" name="email" placeholder="Enter Admin Email" required>
        </div>

        <button class="button">Send Reset Link</button>

    </form>

    <div class="back">
        <a href="<?= base_url('adminLogin') ?>">← Back to Login</a>
    </div>

</div>

</body>
</html>