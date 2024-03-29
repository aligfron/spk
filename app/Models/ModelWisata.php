<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWisata extends Model
{
    protected $table = "data_wisata";
    protected $primaryKey = "id_wisata";
    protected $protectFields = false;
    protected $allowedFields = ["nama_wisata", "alamat", "jarak", "akses", "fasilitas", "kebersihan", "keamanan", "biaya", "jenis_wisata", "gambar"];

    public function search($keyword)
    {
        $builder = $this->table('data_wisata');
        $builder->like('nama_wisata', $keyword);
        return $builder;
    }
}
