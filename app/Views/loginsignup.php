<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login & Signup</title>
  <style>
    :root {
      --bg-light: #f5f5f5;
      --bg-dark: #0f0f0f;
      --card-light: #ffffff;
      --card-dark: #1a1a1a;
      --text-light: #000000;
      --text-dark: #ffffff;
      --accent: #6366f1;
      --transition: 0.5s ease;
    }

    body {
      margin: 0;
      font-family: Poppins, sans-serif;
      background: var(--bg-light);
      color: var(--text-light);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      transition: var(--transition);
    }

    body.dark {
      background: var(--bg-dark);
      color: var(--text-dark);
    }

    .container {
      width: 100%;
      max-width: 380px;
      background: var(--card-light);
      padding: 25px;
      border-radius: 18px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      position: relative;
      overflow: hidden;
      transition: var(--transition);
    }

    body.dark .container {
      background: var(--card-dark);
    }

    .forms {
      display: flex;
      width: 200%;
      transform: translateX(0%);
      transition: var(--transition);
    }

    .form-box {
      width: 100%;
      padding: 25px;
      margin:0px 25px;
    }

    h2 {
      text-align: center;
      margin-bottom: 15px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0px;
      border: none;
      border-radius: 10px;
      background: #e5e5e5;
      font-size: 14px;
    }

    body.dark input {
      background: #333;
      color: white;
    }

    button {
      width: 100%;
      padding: 12px;
      background: var(--accent);
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 10px;
    }

    .toggle-text {
      text-align: center;
      margin-top: 12px;
      font-size: 13px;
      cursor: pointer;
      color: var(--accent);
    }

    .theme-toggle {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
      font-size: 14px;
    }

    @media (max-width: 270px) {
      h2 { font-size: 18px; }
      input, button { font-size: 12px; padding: 8px; }
      .form-box {
      width: 100%;
      padding: 15px;
      margin:0px 15px;
    }
    }

    .show-btn {
        text-align: right;
        margin-top: -7px;
        margin-bottom: 10px;
        color: var(--accent);
        font-size: 13px;
        cursor: pointer;
        user-select: none;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="theme-toggle" onclick="toggleTheme()">🌓</div>

    <div class="forms" id="forms">

      <!-- LOGIN -->
      <div class="form-box" id="loginBox">
        <h2>Login</h2>
        <form  action="<?= site_url('student/login-process') ?>" method="post" enctype="multipart/form-data">
        <input type="text" name='username' placeholder="Student's Admission ID *" required/>
        <input class='password' name='password' type="password" placeholder="Enter Password" required/>
        <div class="show-btn" onclick="togglePass()">👁 Show Password</div>
        <button>Login</button>
        </form>
        <p class="toggle-text" onclick="showSignup()">Don't have an account? Signup</p>
      </div>

      <!-- SIGNUP -->
      <div class="form-box" id="signupBox">
        <h2>Signup</h2>
        <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
        <form  action="<?= site_url('student/signup-process') ?>" method="post" enctype="multipart/form-data">
        <input type="text" name='full_name' placeholder="Student's Full Name *" required/>
        <input type="text" name='admission_id' placeholder="Student's Admission ID *" required/>
        <input class="phone" name="phone" type="tel" pattern="[0-9]{10}" placeholder="10 digit Phone no. *" required />
        <input type="text" name='email' placeholder="Email id (abc12@gamil.com)" />
        <input class='password' name='password' type="password" placeholder="Create Password *" required/>
        <div class="show-btn" onclick="togglePass()">👁 Show Password</div>
        <button>Create Account</button>
        </form>
        <p class="toggle-text" onclick="showLogin()">Already have an account? Login</p>
      </div>

    </div>
  </div>

  <script>
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark");
    }

    // Load last active form on refresh
window.addEventListener("load", function () {
    let form = localStorage.getItem("activeForm");

    if (form === "signup") {
        document.getElementById("forms").style.transform = "translateX(-50%)";
    } else {
        document.getElementById("forms").style.transform = "translateX(0%)";
    }
});


    function showSignup() {
    document.getElementById("forms").style.transform = "translateX(-50%)";

    // save the active form
    localStorage.setItem("activeForm", "signup");

    // Clear inputs
    document.querySelectorAll("input").forEach(inp => inp.value = "");
}

function showLogin() {
    document.getElementById("forms").style.transform = "translateX(0%)";

    // save the active form
    localStorage.setItem("activeForm", "login");

    // Clear inputs
    document.querySelectorAll("input").forEach(inp => inp.value = "");
}


    function toggleTheme() {
        document.body.classList.toggle("dark");

        // Save theme preference
        if (document.body.classList.contains("dark")) {
            localStorage.setItem("theme", "dark");
        } else {
            localStorage.setItem("theme", "light");
        }
    }


    
    document.querySelectorAll("input").forEach(function (inp) {
    inp.addEventListener("input", function () {

        // if input has class "password", do nothing
        if (this.classList.contains("password")) {
            return;
        }

        // otherwise: convert to uppercase
        this.value = this.value.toUpperCase();
    });
});


function togglePass() {
    let fields = document.querySelectorAll('.password');
    fields.forEach(f => {
        f.type = f.type === "password" ? "text" : "password";
    });

}


  </script>

</body>
</html>
