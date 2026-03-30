<?php

namespace App\Controllers;
use App\Models\CoCurricularModel;

class Co_curricular extends BaseController
{
    public function index(): string
    {
        $model = new CoCurricularModel();
        $data['media'] = $model->orderBy('id', 'DESC')->findAll();
        return view('co_curricular',$data);
    }

    public function upload()
    {
        $type = $this->request->getPost('type');
        $path = '';

        if ($type === 'image' || $type === 'video') {
            $file = $this->request->getFile('file');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $folder = ($type === 'image') ? 'uploads/co_curricular/images/' : 'uploads/co_curricular/videos/';
                $file->move($folder, $newName);
                $path = $folder . $newName;
            }
        } elseif ($type === 'youTube' || $type === 'instagram') {
            $path = $this->request->getPost('iframe_code'); // embed HTML/iframe code
        }

        if (!empty($path)) {
            $model = new CoCurricularModel();
            $model->insert([
                'type' => $type,
                'path' => $path
            ]);
        }

        return redirect()->to('admin/bfps-admin-p?section=co-curricular');
    }

    public function delete($id)
    {
        $model = new CoCurricularModel();
        $record = $model->find($id);

        if ($record) {
            if ($record['type'] === 'image' || $record['type'] === 'video') {
                if (file_exists($record['path'])) {
                    unlink($record['path']);
                }
            }
            $model->delete($id);
        }

        return redirect()->to('admin/bfps-admin-p?section=co-curricular');
    }
}