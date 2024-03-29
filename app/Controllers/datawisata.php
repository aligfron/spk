<?php

namespace App\Controllers;

use App\Models\hasiladmin;
use App\Models\Modelnilaialternatif;
use App\Models\Modelnormalisasi;
use App\Models\ModelWisata;
use App\Models\ModelWisatatbh;

class datawisata extends BaseController
{
    protected $session;


    function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
    }

    protected $modeltambah1, $modeltambah, $modeltambahalternatif, $modelhasiladmin, $Modelnormalisasi;
    public function prosestambahalter()
    {
    }
    public function prosestambahwisata()
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $validation = \Config\Services::validation();
        $this->modeltambah1 = new ModelWisatatbh();
        $filegambar = $this->request->getFile('gambar');
        $filegambar->move('img');
        $namagambar = $filegambar->getName();
        $aksess          = $this->request->getVar('akses');
        $fasilitass       = $this->request->getVar('fasilitas');
        if ($fasilitass == '') {
            $hasilfasilitas = 'Tidak Ada';
        } else {
            $hasilfasilitas = implode(",", $fasilitass);
        }
        $keamanann        = $this->request->getVar('keamanan');
        if ($keamanann == '') {
            $hasilkeamanann = 'Tidak Ada';
        } else {
            $hasilkeamanann = implode(",", $keamanann);
        }
        $kebersihann        = $this->request->getVar('kebersihan');
        if ($kebersihann == '') {
            $hasilkebersihann = 'Tidak Ada';
        } else {
            $hasilkebersihann = implode(",", $kebersihann);
        }
        $this->modeltambah1->save(
            [
                'id_wisata'     => $this->request->getVar('idwisata'),
                'nama_wisata'     => $this->request->getVar('namawisata'),
                'alamat'          => $this->request->getVar('alamat'),
                'jarak'           => $this->request->getVar('jarak'),
                'akses'           => $aksess,
                'fasilitas'       => $hasilfasilitas,
                'kebersihan'      => $hasilkebersihann,
                'keamanan'        => $hasilkeamanann,
                'biaya'           => $this->request->getVar('biaya'),
                'jenis_wisata'       => $this->request->getVar('jenis'),
                'gambar'       => $namagambar
            ]
        );
        session()->setFlashdata('pesan', 'Data Berhasil di tambah');
        // jarak
        $jarakpri           = $this->request->getVar('jarak');
        if ($jarakpri >= 40) {
            $nilaijarak = 1;
        } elseif ($jarakpri > 30) {
            $nilaijarak = 2;
        } elseif ($jarakpri > 20) {
            $nilaijarak = 3;
        } elseif ($jarakpri > 10) {
            $nilaijarak = 4;
        } else {
            $nilaijarak = 5;
        }
        // akses 
        if ($aksess == 'Dapat di Akses Semua Transportasi') {
            $nilaiakses = 4;
        } elseif ($aksess == 'Kendaraan pribadi roda 4 dan 2') {
            $nilaiakses = 3;
        } elseif ($aksess == 'kendaraan roda 4 di sambung dengan kendaraan roda 2') {
            $nilaiakses = 2;
        } elseif ($aksess == 'Hanya Kendaraan pribadi roda 2') {
            $nilaiakses = 1;
        }
        // fasilitas 
        $this->modeltambah = new ModelWisata();

        if ($fasilitass == '') {
            $nilaikebersihan = 1;
        } elseif (count($fasilitass) == 4) {
            $nilaikebersihan = 5;
        } elseif (count($fasilitass) == 3) {
            $nilaikebersihan = 4;
        } elseif (count($fasilitass) == 2) {
            $nilaikebersihan = 3;
        } elseif (count($fasilitass) == 1) {
            $nilaikebersihan = 2;
        }
        // kebersihan

        if ($kebersihann == '') {
            $nilaikebersihan1 = 1;
        } elseif (count($kebersihann) == 3) {
            $nilaikebersihan1 = 4;
        } elseif (count($kebersihann) == 2) {
            $nilaikebersihan1 = 3;
        } elseif (count($kebersihann) == 1) {
            $nilaikebersihan1 = 2;
        }
        // keamanan 
        if ($keamanann == '') {
            $nilaikebersihan2 = 1;
        } elseif (count($keamanann) == 3) {
            $nilaikebersihan2 = 4;
        } elseif (count($keamanann) == 2) {
            $nilaikebersihan2 = 3;
        } elseif (count($keamanann) == 1) {
            $nilaikebersihan2 = 2;
        }
        // biaya 
        $biaya = $this->request->getVar('biaya');
        if ($biaya > 30000) {
            $nilaibiaya = 1;
        } else if ($biaya > 20000) {
            $nilaibiaya = 2;
        } else if ($biaya > 10000) {
            $nilaibiaya = 3;
        } else if ($biaya > 5000) {
            $nilaibiaya = 4;
        } else {
            $nilaibiaya = 5;
        }
        $this->modeltambahalternatif = new Modelnilaialternatif();
        $this->modeltambahalternatif->save(
            [
                'id_wisata'     => $this->request->getVar('idwisata'),
                'nilaik1'     => $nilaijarak,
                'nilaik2'          => $nilaiakses,
                'nilaik3'           => $nilaikebersihan,
                'nilaik4'           => $nilaikebersihan1,
                'nilaik5'       => $nilaikebersihan2,
                'nilaik6'      => $nilaibiaya
            ]
        );
        $this->modelhasiladmin = new hasiladmin();
        $this->modelhasiladmin->save(
            [
                'id_wisata'     => $this->request->getVar('idwisata'),
                'jumlah'     => ''
            ]
        );
        $this->Modelnormalisasi = new Modelnormalisasi();
        $this->Modelnormalisasi->save(
            [
                'id_wisata'     => $this->request->getVar('idwisata'),
                'normalisasi1'     => '',
                'normalisasi2'     => '',
                'normalisasi3'     => '',
                'normalisasi4'     => '',
                'normalisasi5'     => '',
                'normalisasi6'     => ''
            ]
        );
        return redirect()->to('/menuadmin/datawisata');
    }
    public function delete($id_wisata)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $this->modeltambah = new ModelWisata();
        $this->modeltambah->delete($id_wisata);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/menuadmin/datawisata');
    }
    public function edit($id_wisata)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $this->modeltambah = new ModelWisata();

        $wisata1 = $this->modeltambah->find($id_wisata);

        $data = [
            'title' => 'Edit wisata',
            'wisata' => $wisata1,
            'checked2' => explode(',', $wisata1['kebersihan']),
            'checked4' => explode(',', $wisata1['fasilitas']),
            'checked3' => explode(',', $wisata1['keamanan'])
        ];
        return view('admin/edit', $data);
    }
    public function update($id_wisata)
    {
        if (!$this->session->has('logged_in')) {
            return redirect()->to('/Login');
        }
        if ($this->session->get('idlevel') != 1) {
            return redirect()->to('/menuwisatawan');
        }
        $this->modeltambah = new ModelWisata();
        $aksess          = $this->request->getVar('akses');
        $fasilitass       = $this->request->getVar('fasilitas');
        if ($fasilitass == '') {
            $hasilfasilitas = 'Tidak Ada';
        } else {
            $hasilfasilitas = implode(",", $fasilitass);
        }
        $keamanann        = $this->request->getVar('keamanan');
        if ($keamanann == '') {
            $hasilkeamanann = 'Tidak Ada';
        } else {
            $hasilkeamanann = implode(",", $keamanann);
        }
        $kebersihann        = $this->request->getVar('kebersihan');
        if ($kebersihann == '') {
            $hasilkebersihann = 'Tidak Ada';
        } else {
            $hasilkebersihann = implode(",", $kebersihann);
        }
        $this->modeltambah1 = new ModelWisatatbh();

        $filegambar = $this->request->getFile('gambar');
        $filegambar->move('img');
        $namagambar = $filegambar->getName();
        $abc = $this->modeltambah1->where('id_wisata', $id_wisata);
        $abc->replace(
            [
                'id_wisata' => $id_wisata,
                'nama_wisata'     => $this->request->getVar('namawisata'),
                'alamat'          => $this->request->getVar('alamat'),
                'jarak'           => $this->request->getVar('jarak'),
                'akses'           => $aksess,
                'fasilitas'       => $hasilfasilitas,
                'kebersihan'      => $hasilkebersihann,
                'keamanan'        => $hasilkeamanann,
                'biaya'           => $this->request->getVar('biaya'),
                'jenis_wisata'       => $this->request->getVar('jenis'),
                'gambar'       => $namagambar
            ]
        );
        session()->setFlashdata('pesan', 'Data Berhasil di ubah');
        // jarak
        $jarakpri           = $this->request->getVar('jarak');
        if ($jarakpri >= 40) {
            $nilaijarak = 1;
        } elseif ($jarakpri > 30) {
            $nilaijarak = 2;
        } elseif ($jarakpri > 20) {
            $nilaijarak = 3;
        } elseif ($jarakpri > 10) {
            $nilaijarak = 4;
        } else {
            $nilaijarak = 5;
        }
        // akses 
        if ($aksess == 'Dapat di Akses Semua Transportasi') {
            $nilaiakses = 4;
        } elseif ($aksess == 'Kendaraan pribadi roda 4 dan 2') {
            $nilaiakses = 3;
        } elseif ($aksess == 'kendaraan roda 4 di sambung dengan kendaraan roda 2') {
            $nilaiakses = 2;
        } elseif ($aksess == 'Hanya Kendaraan pribadi roda 2') {
            $nilaiakses = 1;
        }
        // fasilitas 

        if ($fasilitass == '') {
            $nilaikebersihan = 1;
        } elseif (count($fasilitass) == 4) {
            $nilaikebersihan = 5;
        } elseif (count($fasilitass) == 3) {
            $nilaikebersihan = 4;
        } elseif (count($fasilitass) == 2) {
            $nilaikebersihan = 3;
        } elseif (count($fasilitass) == 1) {
            $nilaikebersihan = 2;
        }
        // kebersihan

        if ($kebersihann == '') {
            $nilaikebersihan1 = 1;
        } elseif (count($kebersihann) == 3) {
            $nilaikebersihan1 = 4;
        } elseif (count($kebersihann) == 2) {
            $nilaikebersihan1 = 3;
        } elseif (count($kebersihann) == 1) {
            $nilaikebersihan1 = 2;
        }
        // keamanan 
        if ($keamanann == '') {
            $nilaikebersihan2 = 1;
        } elseif (count($keamanann) == 3) {
            $nilaikebersihan2 = 4;
        } elseif (count($keamanann) == 2) {
            $nilaikebersihan2 = 3;
        } elseif (count($keamanann) == 1) {
            $nilaikebersihan2 = 2;
        }
        // biaya 
        $biaya = $this->request->getVar('biaya');
        if ($biaya > 30000) {
            $nilaibiaya = 1;
        } else if ($biaya > 20000) {
            $nilaibiaya = 2;
        } else if ($biaya > 10000) {
            $nilaibiaya = 3;
        } else if ($biaya > 5000) {
            $nilaibiaya = 4;
        } else {
            $nilaibiaya = 5;
        }
        $x = \App\Controllers\api::data_alter($id_wisata);

        $db      = \Config\Database::connect();
        $builder = $db->table('nilai_alternatif');
        $builder->where('id_wisata', $id_wisata);
        $builder->update(
            [
                'id_wisata' => $id_wisata,
                'nilaik1'     => $nilaijarak,
                'nilaik2'       => $nilaiakses,
                'nilaik3'       => $nilaikebersihan,
                'nilaik4'       => $nilaikebersihan1,
                'nilaik5'       => $nilaikebersihan2,
                'nilaik6'      => $nilaibiaya,
            ]
        );

        return redirect()->to('/menuadmin/datawisata');
    }
}
