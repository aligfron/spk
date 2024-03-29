<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProfil extends Model
{
    protected $table = "tb_login";
    protected $primaryKey = "userid";
    protected $protectFields = false;
    protected $allowedFields = ["nama_user", "email", "password"];
}
