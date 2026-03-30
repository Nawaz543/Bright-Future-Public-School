<?php

namespace App\Controllers;
use App\Models\MiscellaneousModel;

class Miscellaneous extends BaseController
{

public function store(){
        if (session()->get('role') != 'superadmin') {
            return redirect()->to('/admin/bfps-admin-p?section=miscellaneous')->with('error', '❌ Failed to add Document due to Unauthrizition.')->withInput();   
        } 

        $model = new MiscellaneousModel;
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/miscellaneous/', $newName);

            $data = [
                'type' => $this->request->getPost('type'),
                'file'  => 'uploads/miscellaneous/'.$newName,
                'created_at' => date('Y-m-d')
            ];
         if (! $model->insert($data)) {
            // If insert fails, show errors
            return redirect()->to('admin/bfps-admin-p?section=miscellaneous')->with('error', '❌ Failed to add Document.')->withInput();
        }

        // ✅ Success
        return redirect()->to('admin/bfps-admin-p?section=miscellaneous')->with('success', '✅ Document added successfully!');

      }
    }

    public function delete($id)
    {
        if (session()->get('role') != 'superadmin') {
            return redirect()->to('/admin/bfps-admin-p?section=miscellaneous')->with('error', '❌ Failed to add Document due to Unauthrizition.')->withInput();   
        }
        $model = new MiscellaneousModel();
         // pehle file ka path le lo
    $misModel = $model->find($id); // database se record
    if($misModel && !empty($misModel['file'])) {
        $filePath =  $misModel['file'];
        if(file_exists($filePath)) {
            unlink($filePath); // file delete
        }
    }
        $model->delete($id);
        return redirect()->to('admin/bfps-admin-p?section=miscellaneous')->with('success', '✅ Document deleted successfully!');
    }

    public function edit($id)
    {
        if (session()->get('role') != 'superadmin') {
            return redirect()->to('/admin/bfps-admin-p?section=miscellaneous')->with('error', '❌ Failed to add Document due to Unauthrizition.')->withInput();   
        }
        // Load doc by id and pass to edit form
        $model = new MiscellaneousModel();
        $data['record'] = $model->find($id);
        return view('Backend/edit_miscellaneous', $data);
    }

    public function update($id)
{
    if (session()->get('role') != 'superadmin') {
            return redirect()->to('/admin/bfps-admin-p?section=miscellaneous')->with('error', '❌ Failed to add Document due to Unauthrizition.')->withInput();   
        }
    $model = new MiscellaneousModel();
      // fetch old record
    $oldData = $model->find($id);

    // get uploaded file
    $file = $this->request->getFile('file');

    if ($file && $file->isValid() && !$file->hasMoved()) {
        // delete old file if exists
        if (!empty($oldData['file']) && file_exists($oldData['file'])) {
            unlink($oldData['file']);
        }
        // give unique name
        $newName = $file->getRandomName();

        // move file to uploads/miscellaneous/ folder
        $file->move('uploads/miscellaneous', $newName);

         $fileName = 'uploads/miscellaneous/'.$newName;  // ✅ full path
    } else {
        // keep old file if not uploading new
        $oldData = $model->find($id);
        $fileName = $oldData['file'];
    }

    $data = [
        'type' => $this->request->getPost('type'),
        'file' => $fileName
    ];

    $model->update($id, $data);

    return redirect()->to('admin/bfps-admin-p?section=miscellaneous')->with('success', '✅ Document edited successfully!');
}

}
