<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelnormalisasi extends Model
{
    protected $table = "normalisasi_alternatif";
    protected $primaryKey = "id_normalisasi";
    protected $allowedFields = ["id_wisata", "normalisasi1", "normalisasi2", "normalisasi3", "normalisasi4", "normalisasi5", "normalisasi6"];
}
