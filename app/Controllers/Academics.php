<?php

namespace App\Controllers;
use App\Models\MiscellaneousModel;

class Academics extends BaseController
{
    public function index(): string
    {
        $model = new MiscellaneousModel();

        // ✅ fetch latest Academic Calendar by highest id
        $academicCalendar = $model->where('type', 'Academic Calendar')
                                  ->orderBy('id', 'DESC')
                                  ->first();

        $data = [
            'academicCalendar' => $academicCalendar
        ];

        return view('academics', $data);
    }

    
}
