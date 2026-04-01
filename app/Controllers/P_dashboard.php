<?php
namespace App\Controllers;
use App\Models\NoticeModel;
use App\Models\EventModel;
use App\Models\CoCurricularModel;
use App\Models\StudentCornerModel;
use App\Models\ToppersModel;
use App\Models\MiscellaneousModel;
use App\Models\ContactFormModel;

class P_dashboard extends BaseController
{
  

    public function __construct() { 
        if (!session()->get('isAdminLoggedIn')) { 
            return redirect()->to('/adminLogin')->send(); 
        } 
    }

    public function index()
    {
        if (session()->get('role') === 'superadmin') {
            //contact message
            $model = new ContactFormModel();
            $data['messages'] = $model->orderBy('id', 'DESC')
                                        ->findAll();
        } else {
            $data['messages'] = [];  // empty for normal admin
        }

        if (session()->get('role') === 'superadmin') {
            //miscellaneous
            $model = new MiscellaneousModel();
            $data['records'] = $model->orderBy('id', 'DESC')
                                        ->findAll();
        } else {
            $data['records'] = [];  // empty for normal admin
        }
        
        //notice
         $noticeModel = new NoticeModel();
        $data['notices'] = $noticeModel->orderBy('id', 'DESC')
                                        ->findAll();
        //event
        $eventModel = new EventModel();
        $data['events'] = $eventModel->orderBy('id', 'DESC')
                                        ->findAll();
        //co-curricular
        $coCurricularModel = new CoCurricularModel();
        $data['medias'] = $coCurricularModel->orderBy('id', 'DESC')
                                        ->findAll();

        //student corner
        $stdModel = new StudentCornerModel();
        $data['datas'] = $stdModel->orderBy('id', 'DESC')
                                        ->findAll();
        $data['sections'] = $stdModel->findColumn('section');

        //toppers list / result
        $stdModel = new ToppersModel();
        $data['toppers'] = $stdModel->orderBy('stu_percent', 'DESC')
                                        ->findAll();

        return view('Backend/p_dashboard',$data);
    }

     public function logout()
    {
        // Destroy all session data
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/adminLogin');
    }

   

    

}