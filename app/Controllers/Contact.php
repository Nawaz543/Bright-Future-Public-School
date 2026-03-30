<?php

namespace App\Controllers;
use App\Models\ContactFormModel;

class Contact extends BaseController
{
    public function index(): string
    {
        
        return view('contact');
    }

    public function store()
    {
        $model = new ContactFormModel();

        // Prepare data array (optional columns may be empty)
        $data = [
            'name'       => $this->request->getPost('name') ?? null,
            'email'     => $this->request->getPost('email') ?? null,
            'phone'        => $this->request->getPost('phone') ?? null,
            'message'       => $this->request->getPost('message') ?? null,
            'created_at'  => date('Y-m-d')
        ];

        // Insert data
        $model->insert($data);

        return redirect()->to(base_url('/contact'))
                 ->with('success', 'Message sent successfully!');

    }

    public function markRead($id)
{
    if (session()->get('role') != 'superadmin') {
            return redirect()->back()->with('error', '❌ Failed to add Document due to Unauthrizition.')->withInput();   
        }
    $model = new ContactFormModel();
    $model->update($id, ['is_read' => 1]);

    return redirect()->back()->with('success', 'Marked as read');
}

    public function delete($id)
{
    if (session()->get('role') != 'superadmin') {
            return redirect()->back()->with('error', '❌ Failed to add Document due to Unauthrizition.')->withInput();   
        }
    $model = new ContactFormModel();
    $model->delete($id);

    return redirect()->back()->with('success', 'Message deleted');
}

}