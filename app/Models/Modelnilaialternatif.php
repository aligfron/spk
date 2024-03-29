<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelnilaialternatif extends Model
{
    protected $table = "nilai_alternatif";
    protected $primaryKey = "id_nilai_alternatif";
    protected $protectFields = false;
    protected $allowedFields = ["id_wisata", "nilaik1", "nilaik2", "nilaik3", "nilaik4", "nilaik5", "nilaik6"];
}
