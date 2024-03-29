<?php

namespace App\Models;

use CodeIgniter\Model;

class hasiladmin extends Model
{
    protected $table = "hasil_perhitungan";
    protected $primaryKey = "id_hasil";
    protected $allowedFields = ["id_wisata", "jumlah"];
}
