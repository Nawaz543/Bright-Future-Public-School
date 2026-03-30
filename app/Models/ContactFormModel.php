<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactFormModel extends Model
{

    protected $table = 'contact_form';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'message',
        'is_read',
        'created_at'
    ];

  
}
