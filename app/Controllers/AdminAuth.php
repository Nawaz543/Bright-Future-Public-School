<?php

namespace App\Controllers;


class AdminAuth extends BaseController
{
   public function forgotPassword()
    {
        return view('Backend/admin_forgot');
    }


    public function sendResetLink()
{
    $input = $this->request->getPost('email'); // ya username
    $model = new \App\Models\AdminModel();

    $admin = $model->where('email', $input)
                   ->orWhere('username', $input)
                   ->first();

    if (!$admin) {
        return redirect()->back()->with('error', 'Admin not found');
    }

     if (empty($admin['email'])) {  
        return redirect()->back()->with('error', 'Email not set for admin');  
    }

    $token = bin2hex(random_bytes(50));
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $model->update($admin['id'], [
        'reset_token' => $token,
        'token_expiry' => $expiry
    ]);

    $link = base_url("admin/reset-password/$token");

    // TEMP DEBUG
    // echo $link; exit;

    $email = \Config\Services::email();

    $email->setFrom('bfpschool@gmail.com', 'Bright Future School');
    $email->setTo($admin['email']);
    $email->setSubject('Admin Password Reset');
    $email->setMessage("Reset link: $link");

    if ($email->send()) {
        return redirect()->back()->with('success', 'Reset link sent');
    } else {
        echo $email->printDebugger(['headers']);
    }
}


public function resetPassword($token)
{
    $model = new \App\Models\AdminModel();

    $admin = $model->where('reset_token', $token)->first();

    if (!$admin || strtotime($admin['token_expiry']) < time()) {
        return "Invalid or expired token";
    }

    return view('Backend/admin_reset', ['token' => $token]);
}


public function updatePassword()
{
    $token = $this->request->getPost('token');
    $password = $this->request->getPost('password');

    $model = new \App\Models\AdminModel();

    $admin = $model->where('reset_token', $token)->first();

    if (!$admin) {
        return "Invalid token";
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $model->update($admin['id'], [
        'password' => $hashed,
        'reset_token' => null,
        'token_expiry' => null
    ]);

    return redirect()->to('/adminLogin')->with('success', 'Password updated');
}



    
}
