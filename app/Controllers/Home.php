<?php

namespace App\Controllers;
use App\Models\NoticeModel;
use App\Models\EventModel;

class Home extends BaseController
{
    public function index(): string
    {
        //notice
        $noticeModel = new NoticeModel();
         $data['notices'] = $noticeModel->orderBy('created_at', 'DESC')
                                   ->limit(4)
                                   ->find();
        //event
        $eventModel = new EventModel();
        $data['events'] = $eventModel->orderBy('created_at', 'DESC')
                                   ->limit(4)
                                   ->find();
        return view('home',$data);
    }
}
