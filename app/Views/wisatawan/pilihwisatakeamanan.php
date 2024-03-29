<?php

if (!empty($_POST)) {

    if (empty($_POST['keamanan'])) {
        $hasilkeamanann = 'Tidak Ada';
    } else {
        $hasilkeamanann = implode(",", $_POST['keamanan']);
    }

    $a = \App\Controllers\api::tampildatakeamanan($hasilkeamanann);
    $ab = \App\Controllers\api::tampildatakeamananbudaya($hasilkeamanann);
    $abc = \App\Controllers\api::tampildatakeamananbuatan($hasilkeamanann);
    $abcd = \App\Controllers\api::tampildatakeamanankuliner($hasilkeamanann);
}
?>

<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">
    <div class="row">
        <div class="col">
            <h2>Pilih Tempat Wisata Berdasarkan Keamanannya</h2>
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
                        <td>Keamanan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <input type="checkbox" name="keamanan[1]" value="Akses menuju tempat wisata aman dari kejahatan atau pungli">
                            <label>Akses menuju tempat wisata aman dari kejahatan atau pungli</label><br>
                            <input type="checkbox" name="keamanan[2]" value="Terdapat CCTV">
                            <label>Terdapat CCTV</label><br>
                            <input type="checkbox" name="keamanan[3]" value="Terdapat satpam atau penjaga">
                            <label>Terdapat satpam atau penjaga</label><br>
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
                <h5>Hasil Pencarian Tempat Wisata berdasarkan Keamanan " . $hasilkeamanann . "</h5><hr>
                <div class='row'>";
            echo "<h5>Wisata Alam </h5>
               ";
            if ($a) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatakeamanan($hasilkeamanann) as $k) :
                    echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['akses'] . '</p>
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
            echo "<hr>";

            echo "<h5>Wisata Budaya </h5>
               ";
            if ($ab) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatakeamananbudaya($hasilkeamanann) as $k) :
                    echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['akses'] . '</p>
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
            echo "<hr>";

            echo "<h5>Wisata Buatan </h5>";
            if ($abc) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatakeamananbuatan($hasilkeamanann) as $k) :
                    echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['akses'] . '</p>
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
            echo "<hr>";

            echo "<h5>Wisata Kuliner </h5>
               ";
            if ($abcd) {
                $nomor = 1;
                foreach (\App\Controllers\api::tampildatakeamanankuliner($hasilkeamanann) as $k) :
                    echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['akses'] . '</p>
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
            echo "<hr>";
        }


        ?>
    </div>
</section>
<?= $this->endSection(); ?>