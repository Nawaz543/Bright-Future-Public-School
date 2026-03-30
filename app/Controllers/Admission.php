<?php

namespace App\Controllers;
use App\Models\MiscellaneousModel;

class Admission extends BaseController
{
    public function index(): string
    {
        $model = new MiscellaneousModel();

        // ✅ fetch latest fee structure by highest id
        $feeStructure = $model->where('type', 'Fee Structure')
                                  ->orderBy('id', 'DESC')
                                  ->first();

        $data = [
            'feeStructure' => $feeStructure
        ];
        return view('admission',$data);
    }
}