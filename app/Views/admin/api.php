<?php
$NAMA_DATABASE = 'spkwisataskripsi';
$USERNAME_DATABASE = 'root';
$PASSWORD_DATABASE = '';
$conn = new PDO("mysql:host=localhost;dbname=$NAMA_DATABASE", $USERNAME_DATABASE, $PASSWORD_DATABASE);
?>

<?php

function data_kriteria()
{
    global $conn;

    $q = $conn->prepare('SELECT * FROM perbandingan_kriteria');
    $q->execute();
    return @$q->fetchAll();
}

function bobot_kriteria($k1, $k2)
{
    if ($k1 == $k2) return array('bobot' => '1/1', 'nilai' => 1);
    global $conn;
    $q = $conn->prepare("SELECT * FROM perbandingan_kriteria WHERE (id_kriteria1='$k1' AND id_kriteria2='$k2') OR (id_kriteria1='$k2' AND id_kriteria2='$k1')");
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


?>