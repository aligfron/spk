<?php
$db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
$id = session()->get('userid');

if (!empty($_POST)) {
    foreach (array_keys($_POST) as $x) {
        $k1 = explode('-', $x)[0];
        $k2 = explode('-', $x)[1];
        $abc = $db->prepare("INSERT INTO perbandingan_kriteria_wisatawan VALUE ('','$id','$k1', '$k2', '{$_POST[$x]}')");
        $abc->execute();
    }
    return view('wisatawan/rekombuatan');
}
