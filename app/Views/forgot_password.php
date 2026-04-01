<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        input:focus {
            border-color: #667eea;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #5a67d8;
        }

        .msg {
            margin-top: 10px;
            font-size: 14px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #667eea;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Forgot Password</h2>

    <!-- Flash Messages -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="msg error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="msg success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/send-reset-link">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Reset Link</button>
    </form>

    <a href="/loginSignup">Back to Login</a>
</div>

</body>
</html>