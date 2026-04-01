<?php

namespace App\Controllers;
use App\Models\StuLoginModel;

class LoginSignup extends BaseController
{
    public function index(): string
    {
        return view('loginsignup');
    }

    //signup function
    public function store()
    {
        $model = new StuLoginModel();
        $admission_id = $this->request->getPost('admission_id');
        if (empty($admission_id)) {
            return redirect()->back()->with('error', 'Please fill all required inputs.');
        }

         // Check duplicate admission id
        $existing = $model->where('admission_id', $admission_id)->first();
        if ($existing) {
            return redirect()->back()->with('error', 'Admission ID already exists!');
        }

        $pass = $this->request->getPost('password');
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare data array (optional columns may be empty)
        $data = [
            'admission_id'       => $admission_id ,
            'full_name'     => $this->request->getPost('full_name') ,
            'phone'        => $this->request->getPost('phone'),
            'email'       => $this->request->getPost('email') ?? null,
            'password' => $hashed,
            // 'created_at'  => date('Y-m-d')
        ];

        // Insert data
        $model->insert($data);

        return redirect()->back()->with('success', 'Sigin successfully!');
    }

    //login process
    public function login()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $Model = new StuLoginModel();
    $admin = $Model->where('admission_id', $username)->first();

    if ($admin && password_verify($password, $admin['password'])) {

        session()->set([
    'admission_id' => $admin['admission_id'],
    'isStuLoggedIn' => TRUE
]);



        return redirect()->to('/student');
    }

    return redirect()->back()->with('error', 'Invalid login');
}

public function forgotPassword()
{
    return view('forgot_password');
}

public function sendResetLink()
{
    $email = $this->request->getPost('email');
    $model = new StuLoginModel();

    $user = $model->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email not found');
    }

    // generate token
    $token = bin2hex(random_bytes(50));
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // save token
    $model->update($user['admission_id'], [
        'reset_token' => $token,
        'token_expiry' => $expiry
    ]);

    // reset link
    $link = base_url("reset-password/$token");

    // email send (basic example)
    $emailService = \Config\Services::email();

    $emailService->setFrom('bfpschool@gmail.com', 'Bright Future School');
    $emailService->setTo($email);
    $emailService->setSubject('Password Reset');
    $emailService->setMessage("Click here to reset password: $link");

    if ($emailService->send()) {
        return redirect()->back()->with('success', 'Reset link sent to email');
    } else {
       // return redirect()->back()->with('error', 'Email not sent');
        echo $emailService->printDebugger(['headers', 'subject', 'body']);
    }
}

public function resetPassword($token)
{
    $model = new StuLoginModel();

    $user = $model->where('reset_token', $token)->first();

    if (!$user || strtotime($user['token_expiry']) < time()) {
        return "Invalid or expired token";
    }

    return view('reset_password', ['token' => $token]);
}


public function updatePassword()
{
    $token = $this->request->getPost('token');
    $newPassword = $this->request->getPost('password');

    $model = new StuLoginModel();

    $user = $model->where('reset_token', $token)->first();

    if (!$user) {
        return "Invalid token";
    }

    $hashed = password_hash($newPassword, PASSWORD_DEFAULT);

    $model->update($user['admission_id'], [
        'password' => $hashed,
        'reset_token' => null,
        'token_expiry' => null
    ]);

    return redirect()->to('/loginSignup')->with('success', 'Password updated');
}

 public function logout()
    {
        // Destroy all session data
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/');
    }
}