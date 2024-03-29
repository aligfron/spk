<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelviewkriteria extends Model
{
    protected $table = "view_kriteria";
    protected $allowedFields = ["nama_kriteria", "nilaik1", "nama_kriteria2", "nilaik2"];
}
