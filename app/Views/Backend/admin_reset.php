<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>

<style>
    body {
        background: #0f172a;
        font-family: Poppins, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: #1e293b;
        padding: 30px;
        border-radius: 15px;
        width: 100%;
        max-width: 380px;
        box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    h2 {
        text-align: center;
        color: #e2e8f0;
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #334155;
        background: #0f172a;
        color: white;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #0ea5e9;
        border: none;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }

    button:hover {
        background: #38bdf8;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Reset Password</h2>

    <form method="post" action="<?= base_url('admin/update-password') ?>">
        
        <input type="hidden" name="token" value="<?= $token ?>">

        <input type="password" name="password" placeholder="New Password" required>

        <button>Update Password</button>

    </form>
</div>

</body>
</html>