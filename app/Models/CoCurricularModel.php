<?php

namespace App\Models;

use CodeIgniter\Model;

class CoCurricularModel extends Model
{
    protected $table = 'co_curricular';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'path', 'created_at'];
}
