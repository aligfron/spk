<?php

namespace App\Controllers;

use PDO;

class api extends BaseController
{
    public function index()
    {
        return redirect()->to('admin/bobotkri');
    }
    private $db;

    public function __construct()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
    }
    function data_kriteria()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare('SELECT * FROM tb_kriteria');
        $q->execute();
        return @$q->fetchAll();
    }

    function bobot_kriteria($k1, $k2)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        if ($k1 == $k2) return array('bobot' => '1/1', 'nilai' => 1);

        $q = $db->prepare("SELECT * FROM perbandingan_kriteria WHERE (id_kriteria1='$k1' AND id_kriteria2='$k2') OR (id_kriteria1='$k2' AND id_kriteria2='$k1')");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) {
            @$bobot1 = explode('/', $data['bobot'])[0];
            @$bobot2 = explode('/', $data['bobot'])[1];
            @$n1 = $bobot1 / $bobot2;
            @$n2 = $bobot2 / $bobot1;
            if ($k1 == $data['id_kriteria1']) return array('bobot' => $data['bobot'], 'nilai' => $n1);
            else return array('bobot' => $bobot2 . '/' . $bobot1, 'nilai' => $n2);
            return $data;
        } else return false;
    }
    function bobot_kriteria_wisatawan($k1, $k2)
    {

        $id = session()->get('userid');
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        if ($k1 == $k2) return array('bobot' => '1/1', 'nilai' => 1);

        $q = $db->prepare("SELECT * FROM perbandingan_kriteria_wisatawan WHERE id_wisatawan='$id'and (id_kriteria1='$k1' AND id_kriteria2='$k2') OR (id_kriteria1='$k2' AND id_kriteria2='$k1')");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) {
            @$bobot1 = explode('/', $data['bobot'])[0];
            @$bobot2 = explode('/', $data['bobot'])[1];
            @$n1 = $bobot1 / $bobot2;
            @$n2 = $bobot2 / $bobot1;
            if ($k1 == $data['id_kriteria1']) return array('bobot' => $data['bobot'], 'nilai' => $n1);
            else return array('bobot' => $bobot2 . '/' . $bobot1, 'nilai' => $n2);
            return $data;
        } else return false;
    }
    function data_alter($id_wisata)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT * from nilai_alternatif where id_wisata = '$id_wisata'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.nilaik1, b.nilaik2, b.nilaik3, b.nilaik4, b.nilaik5, b.nilaik6, a.id_wisata from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Alam'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.nilaik1, b.nilaik2, b.nilaik3, b.nilaik4, b.nilaik5, b.nilaik6, a.id_wisata from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Budaya'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.nilaik1, b.nilaik2, b.nilaik3, b.nilaik4, b.nilaik5, b.nilaik6, a.id_wisata from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Buatan'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.nilaik1, b.nilaik2, b.nilaik3, b.nilaik4, b.nilaik5, b.nilaik6, a.id_wisata from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Kuliner'");
        $q->execute();
        return @$q->fetchAll();
    }

    function max_alter1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT  max(b.nilaik1), max(b.nilaik2), max(b.nilaik3), max(b.nilaik4), Max(b.nilaik5), max(b.nilaik6) from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Alam'");
        $q->execute();
        return @$q->fetchAll();
    }
    function max_alter2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT  max(b.nilaik1), max(b.nilaik2), max(b.nilaik3), max(b.nilaik4), Max(b.nilaik5), max(b.nilaik6) from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Budaya'");
        $q->execute();
        return @$q->fetchAll();
    }
    function max_alter3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT  max(b.nilaik1), max(b.nilaik2), max(b.nilaik3), max(b.nilaik4), Max(b.nilaik5), max(b.nilaik6) from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Buatan'");
        $q->execute();
        return @$q->fetchAll();
    }
    function max_alter4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT  max(b.nilaik1), max(b.nilaik2), max(b.nilaik3), max(b.nilaik4), Max(b.nilaik5), max(b.nilaik6) from data_wisata a, nilai_alternatif b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Kuliner'");
        $q->execute();
        return @$q->fetchAll();
    }

    function perkalianbobot1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT bobot from tb_kriteria where id_kriteria = 1");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT bobot from tb_kriteria where id_kriteria = 2");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT bobot from tb_kriteria where id_kriteria = 3");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT bobot from tb_kriteria where id_kriteria = 4");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot5()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT bobot from tb_kriteria where id_kriteria = 5");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot6()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT bobot from tb_kriteria where id_kriteria = 6");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }

    function rank_alter1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata,b.jumlah, rank() over (order by b.jumlah desc), a.id_wisata  from data_wisata a, hasil_perhitungan b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Alam'  ");
        $q->execute();
        return @$q->fetchAll();
    }
    function rank_alter2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, rank() over (order by b.jumlah desc), a.id_wisata  from data_wisata a, hasil_perhitungan b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Budaya' ");
        $q->execute();
        return @$q->fetchAll();
    }
    function rank_alter3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, rank() over (order by b.jumlah desc), a.id_wisata  from data_wisata a, hasil_perhitungan b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Buatan' ");
        $q->execute();
        return @$q->fetchAll();
    }
    function rank_alter4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, rank() over (order by b.jumlah desc), a.id_wisata  from data_wisata a, hasil_perhitungan b where a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Kuliner'");
        $q->execute();
        return @$q->fetchAll();
    }
    function wisata($id_wisata)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata where id_wisata = '$id_wisata'");
        $q->execute();
        return @$q->fetchAll();
    }
    function wisatawan($id_wisata, $id)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_wisatawan b where a.id_wisata = '$id_wisata' and b.id_wisatawan ='$id' and a.id_wisata=b.id_wisata");
        $q->execute();
        return @$q->fetchAll();
    }
    function kriteriawisatawan($id)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT * from perbandingan_kriteria_wisatawan where id_wisatawan ='$id'");
        $q->execute();
        return @$q->fetchAll();
    }

    // wisatawan

    function nilai_alter_w1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.normalisasi1, b.normalisasi2, b.normalisasi3, b.normalisasi4, b.normalisasi5, b.normalisasi6, a.id_wisata from data_wisata a, normalisasi_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Alam'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter_w2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.normalisasi1, b.normalisasi2, b.normalisasi3, b.normalisasi4, b.normalisasi5, b.normalisasi6, a.id_wisata from data_wisata a, normalisasi_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Budaya'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter_w3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.normalisasi1, b.normalisasi2, b.normalisasi3, b.normalisasi4, b.normalisasi5, b.normalisasi6, a.id_wisata from data_wisata a, normalisasi_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Buatan'");
        $q->execute();
        return @$q->fetchAll();
    }
    function nilai_alter_w4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT a.nama_wisata, b.normalisasi1, b.normalisasi2, b.normalisasi3, b.normalisasi4, b.normalisasi5, b.normalisasi6, a.id_wisata from data_wisata a, normalisasi_alternatif b where a.id_wisata = b.id_wisata and jenis_wisata = 'Wisata Kuliner'");
        $q->execute();
        return @$q->fetchAll();
    }

    //bobot kriteria

    function perkalianbobot_w1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT bobot from bobot_kriteria_wisatawan where id_kriteria1 = 1 and id_wisatawan = '$id'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot_w2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT bobot from bobot_kriteria_wisatawan where id_kriteria1 = 2 and id_wisatawan = '$id'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot_w3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT bobot from bobot_kriteria_wisatawan where id_kriteria1 = 3 and id_wisatawan = '$id'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot_w4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT bobot from bobot_kriteria_wisatawan where id_kriteria1 = 4 and id_wisatawan = '$id'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot_w5()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT bobot from bobot_kriteria_wisatawan where id_kriteria1 = 5 and id_wisatawan = '$id'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function perkalianbobot_w6()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT bobot from bobot_kriteria_wisatawan where id_kriteria1 = 6 and id_wisatawan = '$id'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }

    function rank_alter_w1()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, a.id_wisata  from data_wisata a, hasil_wisatawan b where b.id_wisatawan = '$id' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Alam' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function rank_alter_w2()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, a.id_wisata  from data_wisata a, hasil_wisatawan b where b.id_wisatawan = '$id' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Budaya' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function rank_alter_w3()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, a.id_wisata  from data_wisata a, hasil_wisatawan b where b.id_wisatawan = '$id' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Buatan' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function rank_alter_w4()
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $id = session()->get('userid');
        $q = $db->prepare("SELECT a.nama_wisata, b.jumlah, a.id_wisata  from data_wisata a, hasil_wisatawan b where b.id_wisatawan = '$id' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Kuliner' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function hasil_wisatawan($id, $jenis)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');

        $q = $db->prepare("SELECT * from hasil_wisatawan where id_wisatawan ='$id' and jenis = '$jenis'");
        $q->execute();
        @$data = $q->fetchAll()[0];
        if ($data) return $data;
        else return 0;
    }
    function tampildata($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.akses = '$akses' and a.fasilitas = '$hasilfasilitas' and a.kebersihan = '$hasilkebersihann' and a.keamanan = '$hasilkeamanann' and  a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Alam' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatabudaya($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb'  and a.akses = '$akses' and a.fasilitas = '$hasilfasilitas' and a.kebersihan = '$hasilkebersihann' and a.keamanan = '$hasilkeamanann' and  a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Budaya' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatabuatan($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.akses = '$akses' and a.fasilitas = '$hasilfasilitas' and a.kebersihan = '$hasilkebersihann' and a.keamanan = '$hasilkeamanann' and  a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Buatan' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakuliner($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.akses = '$akses' and a.fasilitas = '$hasilfasilitas' and a.kebersihan = '$hasilkebersihann' and a.keamanan = '$hasilkeamanann' and  a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.id_wisata = b.id_wisata and a.jenis_wisata = 'Wisata Kuliner' order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatajarak($selecjaraka, $selecjarakb)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.jenis_wisata = 'Wisata Alam' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatajarakbudaya($selecjaraka, $selecjarakb)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.jenis_wisata = 'Wisata Budaya' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatajarakbuatan($selecjaraka, $selecjarakb)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.jenis_wisata = 'Wisata Buatan' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatajarakkuliner($selecjaraka, $selecjarakb)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.jarak > '$selecjaraka' and a.jarak <='$selecjarakb' and a.jenis_wisata = 'Wisata Kuliner' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildataakses($akses)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.akses = '$akses' and a.jenis_wisata = 'Wisata Alam' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildataaksesbudaya($akses)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.akses = '$akses' and a.jenis_wisata = 'Wisata Budaya' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildataaksesbuatan($akses)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.akses = '$akses' and a.jenis_wisata = 'Wisata Buatan' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildataakseskuliner($akses)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.akses = '$akses' and a.jenis_wisata = 'Wisata Kuliner' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatafasilitas($hasilfasilitas)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.fasilitas = '$hasilfasilitas' and a.jenis_wisata = 'Wisata Alam' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatafasilitasbudaya($hasilfasilitas)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.fasilitas = '$hasilfasilitas' and a.jenis_wisata = 'Wisata Budaya' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatafasilitasbuatan($hasilfasilitas)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.fasilitas = '$hasilfasilitas' and a.jenis_wisata = 'Wisata Buatan' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatafasilitaskuliner($hasilfasilitas)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.fasilitas = '$hasilfasilitas' and a.jenis_wisata = 'Wisata Kuliner' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    // kebersihan
    function tampildatakebersihan($hasilkebersihann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.kebersihan = '$hasilkebersihann' and a.jenis_wisata = 'Wisata Alam' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakebersihanbudaya($hasilkebersihann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.kebersihan = '$hasilkebersihann' and a.jenis_wisata = 'Wisata Budaya' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakebersihanbuatan($hasilkebersihann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.kebersihan = '$hasilkebersihann' and a.jenis_wisata = 'Wisata Buatan' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakebersihankuliner($hasilkebersihann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.kebersihan = '$hasilkebersihann' and a.jenis_wisata = 'Wisata Kuliner' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    // keamanan
    function tampildatakeamanan($hasilkeamanann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.keamanan = '$hasilkeamanann' and a.jenis_wisata = 'Wisata Alam' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakeamananbudaya($hasilkeamanann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.keamanan = '$hasilkeamanann' and a.jenis_wisata = 'Wisata Budaya' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakeamananbuatan($hasilkeamanann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.keamanan = '$hasilkeamanann' and a.jenis_wisata = 'Wisata Buatan' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatakeamanankuliner($hasilkeamanann)
    {

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.keamanan = '$hasilkeamanann' and a.jenis_wisata = 'Wisata Kuliner' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    // biaya
    function tampildatabiaya($selecbiayaa, $selecbiayab)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.jenis_wisata = 'Wisata Alam' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatabiayabudaya($selecbiayaa, $selecbiayab)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.jenis_wisata = 'Wisata Budaya' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatabiayabuatan($selecbiayaa, $selecbiayab)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.jenis_wisata = 'Wisata Buatan' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
    function tampildatabiayakuliner($selecbiayaa, $selecbiayab)
    {
        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $q = $db->prepare("SELECT * from data_wisata a, hasil_perhitungan b  where a.biaya > '$selecbiayaa' and a.biaya <= '$selecbiayab' and a.jenis_wisata = 'Wisata Kuliner' and a.id_wisata = b.id_wisata  order by b.jumlah desc");
        $q->execute();
        return @$q->fetchAll();
    }
}
