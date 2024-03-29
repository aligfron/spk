<?php

use PhpParser\Node\Stmt\Echo_;

if (!empty($_POST)) {
    $jarak = $_POST['jarak'];
    if ($jarak == 10) {
        $t = 'Jarak Kurang dari sama dengan 10KM';
        $selecjaraka = '-1';
        $selecjarakb = '10';
    } elseif ($jarak == 20) {
        $t = 'Jarak Kurang dari sama dengan 20KM';
        $selecjaraka = '10';
        $selecjarakb = '20';
    } elseif ($jarak == 30) {
        $t = 'Jarak Kurang dari sama dengan 30KM';
        $selecjaraka = '20';
        $selecjarakb = '30';
    } elseif ($jarak == 40) {
        $t = 'Jarak Kurang dari sama dengan 40KM';
        $selecjaraka = '30';
        $selecjarakb = '40';
    } else {
        $t = 'Jarak Lebih dari 40KM';
        $selecjaraka = '40';
        $selecjarakb = '1000';
    }
    $a = \App\Controllers\api::tampildatajarak($selecjaraka, $selecjarakb);
    $ab = \App\Controllers\api::tampildatajarakbudaya($selecjaraka, $selecjarakb);
    $abc = \App\Controllers\api::tampildatajarakbuatan($selecjaraka, $selecjarakb);
    $abcd = \App\Controllers\api::tampildatajarakkuliner($selecjaraka, $selecjarakb);
}
?>
<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<section class="home" id="home">
    <div class="row">
        <div class="col">
            <h2>Pilih Tempat Wisata Berdasarkan Jaraknya</h2>
        </div>
        <div class="col-3">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih Berdasarkan Kriterianya
                        </button>
                        <ul class="dropdown-menu">
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisata">Pilih Berdasarkan Semua Kriteria</a>
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisatajarak">Pilih Berdasarkan Jarak</a>
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisataakses">Pilih Berdasarkan Akses</a>
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisatafasilitas">Pilih Berdasarkan Fasilitas</a>
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisatakebersihan">Pilih Berdasarkan Kebersihan</a>
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisatakeamanan">Pilih Berdasarkan Keamanan</a>
                            <a class="dropdown-item" href="/menuwisatawan/pilihwisatabiaya">Pilih Berdasarkan Biaya</a>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <form name="twisata" method="POST">
                <table class="table">
                    <p class="text-danger">*Silahkan isi atau pilih kriteria dibawah ini untuk menampilkan tempat wisata yang anda inginkan</p>
                    <tr>
                        <td>Jarak (KM)</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><select name="jarak" class="form-select" required>
                                <option value="10">Jarak Kurang dari sama dengan 10KM</option>
                                <option value="20">Jarak Kurang dari sama dengan 20KM</option>
                                <option value="30">Jarak Kurang dari sama dengan 30KM</option>
                                <option value="40">Jarak Kurang dari sama dengan 40KM</option>
                                <option value="50">Jarak Lebih dari 40KM</option>
                            </select>
                            <p class="text-danger">*Jarak dihitung dari Pusat Kota Bangkalan yaitu Taman Rekreasi Kota ke lokasi wisata</p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"><input type="submit" name="dbarang" Value="Cari" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
        if (!empty($_POST)) {
            echo "
                <h5>Hasil Pencarian Tempat Wisata yang " . $t . " </h5><hr>
                <div class='row'>
                <h5>Wisata Alam </h5>
               ";
            if ($a) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatajarak($selecjaraka, $selecjarakb) as $k) : ?>
                <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" style="width:320px;height:300px;">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['jarak'] . '</p>
                        <a href="/menuwisatawan/detail/' . $k['id_wisata'] . '" class="btn btn-primary  btn-sm">Detail</a>
                  </div>
                </div><br>
            </div>';

                endforeach;
            } else {
                echo '
                <div class="alert alert-warning" role="alert">
                <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
                </div>';
            }
            echo '</div>';
            echo "<hr>
                <div class='row'>
                <h5>Wisata Budaya </h5>
                ";
            if ($ab) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatajarakbudaya($selecjaraka, $selecjarakb) as $k) : ?>
                <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['jarak'] . '</p>
                        <a href="/menuwisatawan/detail/' . $k['id_wisata'] . '" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div><br>
            </div>';

                endforeach;
            } else {
                echo '
                <div class="alert alert-warning" role="alert">
                <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
                </div>';
            }
            echo '</div>';
            echo "<hr>
                <div class='row'>
                <h5>Wisata Buatan </h5>
                ";

            if ($abc) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatajarakbuatan($selecjaraka, $selecjarakb) as $k) : ?>
                <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['jarak'] . '</p>
                        <a href="/menuwisatawan/detail/' . $k['id_wisata'] . '" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div><br>
            </div>';

                endforeach;
            } else {
                echo '
            <div class="alert alert-warning" role="alert">
            <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
            </div>';
            }
            echo '</div>';
            echo "<hr>
                <div class='row'>
                <h5>Wisata Kuliner </h5>
                ";

            if ($abcd) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatajarakkuliner($selecjaraka, $selecjarakb) as $k) : ?>
        <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" style="width:320px;height:200px;">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text"> Jarak = ' . $k['jarak'] . ' KM</p>
                        <a href="/menuwisatawan/detail/' . $k['id_wisata'] . '" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div><br>
            </div>';

                endforeach;
            } else {
                echo '            <div class="alert alert-warning" role="alert">
            <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
            </div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</section>
<?= $this->endSection(); ?>