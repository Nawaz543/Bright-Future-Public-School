<?php

namespace App\Models;

use CodeIgniter\Model;

class StuLoginModel extends Model
{
    protected $table = 'loginStudents';          // your table
    protected $primaryKey = 'admission_id';

    protected $allowedFields = ['admission_id',	'full_name', 'phone', 'email', 'password',	'created_at','reset_token','token_expiry' ];

   
}
