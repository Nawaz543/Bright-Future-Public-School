<?php

namespace App\Controllers;
use App\Models\StudentCornerModel;
use App\Models\ToppersModel;

class Student extends BaseController
{
    public function index(): string
    {
        //student corner
        $stdModel = new StudentCornerModel();
        $data['datas'] = $stdModel->orderBy('id', 'DESC')
                                        ->findAll();
        $data['sections'] = $stdModel->findColumn('section');

        //toppers list / result
        $stdModel = new ToppersModel();
        $data['toppers'] = $stdModel->orderBy('stu_percent', 'DESC')
                                        ->findAll();
        return view('student',$data);
    }
//backend

    public function store()
    {
        $model = new StudentCornerModel();

        // Validate mandatory field
        $section = $this->request->getPost('section');
        if (empty($section)) {
            return redirect()->back()->with('error', 'Section is required.');
        }

        // Handle file upload
        $file = $this->request->getFile('file'); // input name="file"
        $filePath = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads/studentCorner/', $newName);
            $filePath = "uploads/studentCorner/$newName";
        }

        // Prepare data array (optional columns may be empty)
        $data = [
            'section'     => $section,
            'class'       => $this->request->getPost('class') ?? null,
            'subject'     => $this->request->getPost('subject') ?? null,
            'path'        => $this->request->getPost('path') ?? null,
            'file'        => $filePath,
            'title'       => $this->request->getPost('title') ?? null,
            'start'       => $this->request->getPost('start') ?? null,
            'end'         => $this->request->getPost('end') ?? null,
            'author'      => $this->request->getPost('author') ?? null,
            'on_year'     => $this->request->getPost('on_year') ?? null,
            'exam_name'   => $this->request->getPost('exam_name') ?? null,
            'status'      => $this->request->getPost('status') ?? null,
            'created_at'  => date('Y-m-d')
        ];

        // Insert data
        $model->insert($data);

        return redirect()->back()->with('success', 'Record added successfully!');
    }

    
    // update exam schedule
    public function update()
{
    $model = new StudentCornerModel();

    // Fix record ID = 1
    $id = 1;

    // Find old record
    $oldRecord = $model->find($id);

    if (!$oldRecord) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    // Handle new file
    $file = $this->request->getFile('file');
    $filePath = $oldRecord['file']; // default: keep old file

    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Delete old file if exists
        if (!empty($oldRecord['file']) && file_exists(FCPATH . $oldRecord['file'])) {
            unlink(FCPATH . $oldRecord['file']);
        }

        // Upload new file
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/studentCorner/', $newName);
        $filePath = 'uploads/studentCorner/' . $newName;
    }

    // Prepare update data
    $data = [
        'section'   => $this->request->getPost('section'),
        'exam_name' => $this->request->getPost('exam_name'),
        'start'     => $this->request->getPost('start'),
        'end'       => $this->request->getPost('end'),
        'file'      => $filePath,
    ];

    // Update record
    $model->update($id, $data);

    return redirect()->back()->with('success', 'Exam schedule updated successfully!');
}



public function delete($id)
{
    $stdModel = new StudentCornerModel();

    // Find the record
    $oldRecord = $stdModel->find($id);

    if ($oldRecord) {
        // Delete file if it exists
        if (!empty($oldRecord['file']) && file_exists(FCPATH . $oldRecord['file'])) {
            unlink(FCPATH . $oldRecord['file']);
        }

        // Delete row from DB
        $stdModel->delete($id);

        return redirect()->back()->with('success', 'Record and file deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Record not found.');
    }
}
// Topper
public function storeTopper()
    {
        $model = new ToppersModel();

        // Validate mandatory field
        $category = $this->request->getPost('category');
        if (empty($category)) {
            return redirect()->back()->with('error', 'Category is required.');
        }

        // Handle file upload
        $file = $this->request->getFile('pic'); // input name="file"
        $filePath = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/uploads/toppersPic/', $newName);
            $filePath = "uploads/toppersPic/$newName";
        }

        // Prepare data array (optional columns may be empty)
        $data = [
            'category'     => $category,
            'stu_name'       => $this->request->getPost('stu_name') ?? null,
            'stu_class'     => $this->request->getPost('stu_class') ?? null,
            'stu_percent'        => $this->request->getPost('stu_percent') ?? null,
            'exam_name'   => $this->request->getPost('exam_name') ?? null,
            'pic'        => $filePath,
            'created_at'  => date('Y-m-d')
        ];

        // Insert data
        $model->insert($data);

        return redirect()->back()->with('success', 'Record added successfully!');
    }

     public function editTopper($id)
    {
        // Load doc by id and pass to edit form
        $model = new ToppersModel();
        $data['topper'] = $model->find($id);
        return view('Backend/edit_topper', $data);
    }

    public function updateTopper($id)
{
    $topModel = new ToppersModel();

    // Fetch old record
    $old = $topModel->find($id);


    // Prepare data
    $data = [
        'stu_name'   => $this->request->getPost('stu_name'),
        'stu_class'  => $this->request->getPost('stu_class'),
        'stu_percent'=> $this->request->getPost('stu_percent'),
        'exam_name'  => $this->request->getPost('exam_name'),
        'category'   => $this->request->getPost('category'),
    ];

    // Handle File Upload
    $file = $this->request->getFile('file');

    if ($file && $file->isValid() && !$file->hasMoved()) {

        // Delete old file
        if (!empty($old['pic']) && file_exists(FCPATH . $old['pic'])) {
            unlink(FCPATH . $old['pic']);
        }

        // Upload new file
        $newName = $file->getRandomName();
        $file->move('uploads/toppersPic', $newName);

        // Save new file path
        $data['pic'] = 'uploads/toppersPic/' . $newName;
    }
    // Update DB
    $topModel->update($id, $data);

    return redirect()->to(base_url('admin/bfps-admin-p?section=topper'))
                     ->with('success', 'Updated Successfully!');
}



    public function deleteTopper($id)
{
    $topModel = new ToppersModel();

    // Find the record
    $oldRecord = $topModel->find($id);
    if ($oldRecord) {
        // Delete file if it exists
        if (!empty($oldRecord['pic']) && file_exists(FCPATH . $oldRecord['pic'])) {
            unlink(FCPATH . $oldRecord['pic']);
        }

        // Delete row from DB
        $topModel->delete($id);

        return redirect()->back()->with('success', 'Record and file deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Record not found.');
    }
}
}

