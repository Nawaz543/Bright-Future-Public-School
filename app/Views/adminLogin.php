<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

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
        background: #0f172a; /* dark navy */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 400px;
        background: #1e293b; /* slightly lighter dark */
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
        margin-bottom: 25px;
        font-size: 26px;
    }

    .input-group {
        margin-bottom: 20px;
        width: 100%;
    }

    .input-group input {
        width: 100%;
        padding: 14px 15px;
        border-radius: 10px;
        border: 1px solid #334155; 
        background: #0f172a; 
        color: #e2e8f0;
        font-size: 15px;
        outline: none;
        transition: 0.25s;
    }

    .input-group input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 10px rgba(56, 189, 248, 0.4);
    }

    ::placeholder {
        color: #94a3b8; /* clear visible placeholder */
    }

    .show-btn {
        text-align: right;
        margin-top: -15px;
        margin-bottom: 10px;
        color: #38bdf8;
        font-size: 13px;
        cursor: pointer;
        user-select: none;
    }

    .button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #0891b2, #0ea5e9);
        border: none;
        color: white;
        font-size: 17px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .button:hover {
        background: linear-gradient(135deg, #0ea5e9, #38bdf8);
        transform: scale(1.02);
    }

    /* Flash error message */
    .error {
        background: rgba(255, 80, 80, 0.2);
        padding: 10px;
        text-align: center;
        margin-bottom: 15px;
        border-radius: 8px;
        color: #ff7b7b;
        font-size: 14px;
    }

    /* Mobile responsiveness */
    @media (max-width: 450px){
        .container {
            padding: 25px;
            border-radius: 15px;
        }

        h2 {
            font-size: 22px;
        }
    }
</style>

</head>
<body>

<div class="container">

    <h2>Admin Login</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('admin/login-process'); ?>" method="post">

        <div class="input-group">
            <input type="text" name="username" placeholder="Enter Username" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
        </div>

        <div class="show-btn" onclick="togglePass()">👁 Show Password</div>

        <button class="button">Login</button>

    </form>

</div>

<script>
function togglePass(){
    let x = document.getElementById("password");
    x.type = x.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
