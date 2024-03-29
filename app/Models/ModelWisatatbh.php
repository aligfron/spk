<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWisatatbh extends Model
{
    protected $table = "data_wisata";
    protected $protectFields = false;
    protected $allowedFields = ["id_wisata", "nama_wisata", "alamat", "jarak", "akses", "fasilitas", "kebersihan", "keamanan", "biaya", "jenis_wisata", "gambar"];
}
