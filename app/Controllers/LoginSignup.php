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



        return redirect()->to('/');
    }

    return redirect()->back()->with('error', 'Invalid login');
}
}