<?php

namespace App\Models;

use CodeIgniter\Model;

class ToppersModel extends Model {
    protected $table = 'toppers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'category',
        'stu_name',
        'stu_class',
        'stu_percent',
        'exam_name',
        'pic'];
}