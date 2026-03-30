<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Hello extends BaseController{

    public function index (){
       
        return view('adminLogin');
    }

    public function loginProcess()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $adminModel = new AdminModel();
    $admin = $adminModel->where('username', $username)->first();

    if ($admin && password_verify($password, $admin['password'])) {

        session()->set([
    'admin_id' => $admin['id'],
    'username' => $admin['username'],
    'role'     => $admin['role'],
    'isAdminLoggedIn' => TRUE
]);



        return redirect()->to('admin/bfps-admin-p');
    }

    return redirect()->back()->with('error', 'Invalid login');
}

}
