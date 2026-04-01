<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';          // your table
    protected $primaryKey = 'id';

   protected $allowedFields = [
    'username',
    'email',
    'password',
    'role',
    'reset_token',
    'token_expiry'
];

    protected $useTimestamps = true;
}
