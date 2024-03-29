<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use App\Models\ModelProfil;
use App\Models\ModelWisata;
use PDO;

class menuwisatawan extends BaseController
{
    protected $ModelWisata, $Modelprofil, $session, $db;
    public function __construct()
    {
        $this->ModelWisata = new ModelWisata();
        $this->Modelprofil = new ModelLogin();

        $this->session = session();
    }
    public function index()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        return view('wisatawan/index');
    }

    public function rekomendasiwisata()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [
            'title' => 'Rekomendasi Wisata'
        ];
        return view('admin/rekomendasi', $data);
    }




    public function profil()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $apel = session()->get('userid');
        $profil = $this->Modelprofil->find($apel);
        $data = [
            'title' => 'Profil',
            'profil' => $profil
        ];
        return view('wisatawan/profil', $data);
    }
    public function editprofil()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $apel = session()->get('userid');
        $profil = $this->Modelprofil->find($apel);
        $data = [
            'title' => 'Profil',
            'profil' => $profil
        ];
        return view('wisatawan/profiledit', $data);
    }
    public function editprofil2($iduser)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
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
        return view('wisatawan/profil', $data);
    }
    public function updatekriteria($id)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        if (!empty($_POST)) {
            foreach (array_keys($_POST) as $x) {
                $k1 = explode('-', $x)[0];
                $k2 = explode('-', $x)[1];
                $q = $db->prepare("UPDATE perbandingan_kriteria_wisatawan SET bobot='{$_POST[$x]}' WHERE id_kriteria1='$k1' and id_kriteria2='$k2' and id_wisatawan='$id'");
                $q->execute();
            }
        }
        return view('wisatawan/rekombuatan');
    }
    public function tambahkriteria($idabc)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        if (!empty($_POST)) {
            foreach (array_keys($_POST) as $x) {
                $k1 = explode('-', $x)[0];
                $k2 = explode('-', $x)[1];
                $abc = $db->prepare("INSERT INTO perbandingan_kriteria_wisatawan VALUE ('','$idabc','$k1', '$k2', '{$_POST[$x]}')");
                $abc->execute();
            }
        }
        return view('wisatawan/rekombuatan');
    }
    public function pilihwisata()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        return view('wisatawan/pilihwisata');
    }
    public function prosespilih()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $jarak = $this->request->getVar('jarak');
        $akses = $this->request->getVar('akses');
        $biaya = $this->request->getVar('biaya');
        $fasilitass       = $this->request->getVar('fasilitas');
        $keamanann        = $this->request->getVar('keamanan');
        $kebersihann        = $this->request->getVar('kebersihan');
        if ($fasilitass == '') {
            $hasilfasilitas = 'Tidak Ada';
        } else {
            $hasilfasilitas = implode(",", $fasilitass);
        }
        if ($keamanann == '') {
            $hasilkeamanann = 'Tidak Ada';
        } else {
            $hasilkeamanann = implode(",", $keamanann);
        }
        if ($kebersihann == '') {
            $hasilkebersihann = 'Tidak Ada';
        } else {
            $hasilkebersihann = implode(",", $kebersihann);
        }
        if ($jarak == 10) {
            $selecjaraka = '-1';
            $selecjarakb = '10';
        } elseif ($jarak == 20) {
            $selecjaraka = '10';
            $selecjarakb = '20';
        } elseif ($jarak == 30) {
            $selecjaraka = '20';
            $selecjarakb = '30';
        } elseif ($jarak == 40) {
            $selecjaraka = '30';
            $selecjarakb = '40';
        } else {
            $selecjaraka = '40';
            $selecjarakb = '1000';
        }

        $nomor = 1;
        if ($biaya == 10) {
            $selecbiayaa = '-1';
            $selecbiayab = '5000';
        } elseif ($biaya == 20) {
            $selecbiayaa = '5000';
            $selecbiayab = '10000';
        } elseif ($biaya == 30) {
            $selecbiayaa = '10000';
            $selecbiayab = '20000';
        } elseif ($biaya == 40) {
            $selecbiayaa = '20000';
            $selecbiayab = '30000';
        } else {
            $selecbiayaa = '30000';
            $selecbiayab = '300000';
        }

        $data = [
            'title' => 'Profil',
            'selecjaraka' => $selecjaraka,
            'selecjarakb' => $selecjarakb,
            'akses' => $akses,
            'biaya' => $biaya,
            'hasilfasilitas' => $hasilfasilitas,
            'hasilkeamanann' => $hasilkeamanann,
            'hasilkebersihann' => $hasilkebersihann,
            'selecbiayaa' => $selecbiayaa,
            'selecbiayab' => $selecbiayab
        ];
        return view('wisatawan/pilihwisata2', $data);
    }
    public function pilihwisatajarak()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [];
        return view('wisatawan/pilihwisatajarak', $data);
    }
    public function pilihwisataakses()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [];
        return view('wisatawan/pilihwisataakses', $data);
    }
    public function pilihwisatafasilitas()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [];
        return view('wisatawan/pilihwisatafasilitas', $data);
    }
    public function pilihwisatakebersihan()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [];
        return view('wisatawan/pilihwisatakebersihan', $data);
    }
    public function pilihwisatakeamanan()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [];
        return view('wisatawan/pilihwisatakeamanan', $data);
    }
    public function pilihwisatabiaya()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $data = [];
        return view('wisatawan/pilihwisatabiaya', $data);
    }
    public function detail($id_wisata)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        $this->ModelWisata = new ModelWisata();

        $wisata1 = $this->ModelWisata->find($id_wisata);
        $data = [
            'wisatadetail' => $wisata1
        ];
        return view('wisatawan/detail', $data);
    }
}
