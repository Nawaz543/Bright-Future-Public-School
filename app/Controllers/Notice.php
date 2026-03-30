<?php

namespace App\Controllers;
use App\Models\NoticeModel;
use App\Models\EventModel;

class Notice extends BaseController
{

    public function index(): string
    { 
        $noticeModel = new NoticeModel();
        $data['notices'] = $noticeModel->orderBy('created_at', 'DESC')
                                        ->findAll();
        //event
        $eventModel = new EventModel();
        $data['events'] = $eventModel->orderBy('created_at', 'DESC')
                                        ->findAll();
        return view('notice', $data);
    }
//Backend dashboard
    //Backend dashboard of notice 
    public function store()
    {
        $model = new NoticeModel();
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/notices/', $newName);

            $data = [
                'title' => $this->request->getPost('title'),
                'file'  => 'uploads/notices/'.$newName,
                'created_at' => date('Y-m-d')
            ];
         if (! $model->insert($data)) {
            // If insert fails, show errors
            return redirect()->to('admin/bfps-admin-p?section=notices')->with('error', '❌ Failed to add notice.')->withInput();
        }

        // ✅ Success
        return redirect()->to('admin/bfps-admin-p?section=notices')->with('success', '✅ Notice added successfully!');

    }

    return redirect()->to('admin/bfps-admin-p?section=notices')->with('error', '❌ File upload failed. Please try again.');
    }

    public function delete($id)
    {
        $noticeModel = new NoticeModel();
         // pehle file ka path le lo
    $notice = $noticeModel->find($id); // database se record
    if($notice && !empty($notice['file'])) {
        $filePath =  $notice['file'];
        if(file_exists($filePath)) {
            unlink($filePath); // file delete
        }
    }
        $noticeModel->delete($id);
        return redirect()->to('admin/bfps-admin-p?section=notices')->with('success', '✅ Notice deleted successfully!');
    }

    public function edit($id)
    {
        // Load notice by id and pass to edit form
        $noticeModel = new NoticeModel();
        $data['notice'] = $noticeModel->find($id);
        return view('Backend/edit_notice', $data);
    }

    public function update($id)
{
    $noticeModel = new NoticeModel();

    // get uploaded file
    $file = $this->request->getFile('file');
    // fetch old record
    $oldData = $noticeModel->find($id);

    if ($file && $file->isValid() && !$file->hasMoved()) {
        // delete old file if exists
        if (!empty($oldData['file']) && file_exists($oldData['file'])) {
            unlink($oldData['file']);
        }
        // give unique name
        $newName = $file->getRandomName();

        // move file to writable/uploads/ folder
        $file->move('uploads/notices', $newName);

        $filePath = 'uploads/notices/' . $newName;
    } else {
        // keep old file if not uploading new
        $oldData = $noticeModel->find($id);
        $filePath = $oldData['file'];
    }


    $data = [
    'title'     => $this->request->getPost('title'),
    'file' => $filePath
    ];


    $noticeModel->update($id, $data);

    return redirect()->to('admin/bfps-admin-p?section=notices')->with('success', '✅ Notice edited successfully!');
}

//Backend dashboard of Event 
    public function storeEvent()
    {
        $model = new EventModel();
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/event/', $newName);

            $data = [
                'title' => $this->request->getPost('title'),
                'file'  => 'uploads/event/'.$newName,
                'created_at' => date('Y-m-d')
            ];
         if (! $model->insert($data)) {
            // If insert fails, show errors
            return redirect()->to('admin/bfps-admin-p?section=events')->with('error', '❌ Failed to add Event.')->withInput();
        }

        // ✅ Success
        return redirect()->to('admin/bfps-admin-p?section=events')->with('success', '✅ Event added successfully!');
    }

    return redirect()->to('admin/bfps-admin-p?section=events')->with('error', '❌ File upload failed. Please try again.');
    }

    public function deleteEvent($id)
    {
        $eventModel = new EventModel();
        $event = $eventModel->find($id); // database se record
    if($event && !empty($event['file'])) {
        $filePath =  $event['file'];
        if(file_exists($filePath)) {
            unlink($filePath); // file delete
        }
    }
        $eventModel->delete($id);
        return redirect()->to('admin/bfps-admin-p?section=events')->with('success', '✅ Event deleted successfully!');
    }

    public function editEvent($id)
    {
        // Load event by id and pass to edit form
        $eventModel = new EventModel();
        $data['event'] = $eventModel->find($id);
        return view('Backend/edit_event', $data);
    }

    public function updateEvent($id)
{
    $eventModel = new EventModel();

    // get uploaded file
    $file = $this->request->getFile('file');
    // fetch old record
    $oldData = $eventModel->find($id);

    if ($file && $file->isValid() && !$file->hasMoved()) {
        // delete old file if exists
        if (!empty($oldData['file']) && file_exists($oldData['file'])) {
            unlink($oldData['file']);
        }
        // give unique name
        $newName = $file->getRandomName();

        // move file to writable/uploads/ folder
        $file->move('uploads/event', $newName);

        $filePath = 'uploads/event/' . $newName;
    } else {
        // keep old file if not uploading new
        $oldData = $eventModel->find($id);
        $filePath = $oldData['file'];
    }


    $data = [
    'title'     => $this->request->getPost('title'),
    'file' => $filePath
    ];


    $eventModel->update($id, $data);

    return redirect()->to('admin/bfps-admin-p?section=events')->with('success', '✅ Event updated successfully!');
}
}
