<?php

namespace App\Controllers;

use App\Models\Modeldatakriteria;
use App\Models\ModelLogin;
use App\Models\ModelProfil;
use App\Models\Modelviewkriteria;
use App\Models\ModelWisata;
use PDO;

class menuadmin extends BaseController
{
    protected $ModelWisata, $Modelprofil, $modelkriteria, $modeldatakriteria, $session;
    public function __construct()
    {
        $this->ModelWisata = new ModelWisata();
        $this->Modelprofil = new ModelLogin();
        $db = \Config\Database::connect();
        $this->session = session();
    }
    public function index()
    {

        $session = session();
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        return view('admin/index');
    }



    // kriteria

    public function kriteria()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $db = \Config\Database::connect();
        $this->modelkriteria = new Modelviewkriteria();
        $this->modeldatakriteria = new Modeldatakriteria();
        $kriteria = $this->modelkriteria->findAll();
        $datakriteria = $this->modeldatakriteria->findAll();
        // $query = $db->query('select * from view_kriteria');
        // $row = $query->getRow();


        $data = [
            'title' => 'Profil',
            'data_kriteria' => $datakriteria,
            'kriteria' => $kriteria,
            'row' => $datakriteria
        ];
        return view('admin/kriteria', $data);
    }




    // kriteria

    public function rekomendasiwisata()
    {
        $data = [
            'title' => 'Rekomendasi Wisata'
        ];
        return view('admin/rekomendasi', $data);
    }
    public function datawisata()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        // pencarian 
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $wisata1 = $this->ModelWisata->search($keyword);
        } else {
            $wisata1 = $this->ModelWisata;
        }
        $wisata = $wisata1->paginate(10, 'wisata');
        $pager = $this->ModelWisata->pager;

        $nomor = nomor($this->request->getVar('page_wisata'), 10);
        $data = [
            'title' => 'Daftar wisata',
            'wisata' => $wisata,
            'pager' => $pager,
            'nomor' => $nomor
        ];
        return view('admin/datawisata', $data);
    }

    // tambahdatawisata
    public function tambahdatawisata()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $db      = \Config\Database::connect();
        $q = $db->query("Select id_wisata from data_wisata order by 1 DESC limit 1;");
        $query1 =  $q->getRowArray();
        $data = [
            'title' => 'Tambah wisata',

            'query1' => $query1
        ];

        return view('admin/tambahdatawisata', $data);
    }

    public function profil()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $apel = session()->get('userid');
        $profil = $this->Modelprofil->find($apel);
        $data = [
            'title' => 'Profil',
            'profil' => $profil
        ];
        return view('admin/profil', $data);
    }
    public function editprofil()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $apel = session()->get('userid');
        $profil = $this->Modelprofil->find($apel);
        $data = [
            'title' => 'Profil',
            'profil' => $profil
        ];
        return view('admin/profiledit', $data);
    }
    public function editprofil2($iduser)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $this->Modelprofil = new ModelProfil();
        $this->Modelprofil->update(
            $iduser,
            [
                'nama_user' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password')
            ]
        );
        session()->setFlashdata('pesan', 'Data Berhasil di ubah');
        $apel = session()->get('userid');
        $profil = $this->Modelprofil->find($apel);
        $data = [
            'title' => 'Profil',
            'profil' => $profil
        ];
        return view('admin/profil', $data);
    }

    public function bobotalternatif()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        return view('admin/bobot_alternatif');
    }
    public function rangkingalternatif()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        return view('admin/rangking');
    }
    public function ketentuan()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }

        return view('admin/ketentuan');
    }
}
