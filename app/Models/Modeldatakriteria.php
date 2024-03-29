<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldatakriteria extends Model
{
    protected $table = "tb_kriteria";
    protected $primaryKey = "id_kriteria";
    protected $allowedFields = ["nama_kriteria", "atribut"];
}
