<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';          // your table
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password','role' , 'created_at'];

    protected $useTimestamps = true;
}
