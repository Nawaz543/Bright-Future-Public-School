<?php

namespace App\Models;

use CodeIgniter\Model;

class MiscellaneousModel extends Model
{
    protected $table = 'miscellaneous';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'file', 'created_at'];
}
