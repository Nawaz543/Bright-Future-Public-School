<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentCornerModel extends Model {
    protected $table = 'study_materials';
    protected $primaryKey = 'id';

    protected $allowedFields = [
"id",
"section",
"class",
"subject",
"path",
"file",
"title",
"start",
"end",
"author",
"on_year",
"exam_name",
"status",
"created_at"];
}