<?php
if (!empty($_POST)) {
    $biaya = $_POST['biaya'];
    if ($biaya == 10) {
        $t = "Biaya Kurang dari sama dengan 5000 Rupiah";
        $selecbiayaa = '-1';
        $selecbiayab = '5000';
    } elseif ($biaya == 20) {
        $t = "Biaya Kurang dari sama dengan 10000 Rupiah";
        $selecbiayaa = '5000';
        $selecbiayab = '10000';
    } elseif ($biaya == 30) {
        $t = "Biaya Kurang dari sama dengan 20000 Rupiah";
        $selecbiayaa = '10000';
        $selecbiayab = '20000';
    } elseif ($biaya == 40) {
        $t = "Biaya Kurang dari sama dengan 30000 Rupiah";
        $selecbiayaa = '20000';
        $selecbiayab = '30000';
    } else if ($biaya == 50) {
        $t = "Biaya Lebih dari 30000 Rupiah";
        $selecbiayaa = '30000';
        $selecbiayab = '300000';
    }
    $a = \App\Controllers\api::tampildatabiaya($selecbiayaa, $selecbiayab);
    $ab = \App\Controllers\api::tampildatabiayabudaya($selecbiayaa, $selecbiayab);
    $abc = \App\Controllers\api::tampildatabiayabuatan($selecbiayaa, $selecbiayab);
    $abcd = \App\Controllers\api::tampildatabiayakuliner($selecbiayaa, $selecbiayab);
}
?>
<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">
    <div class="row">
        <div class="col">
            <h2>Pilih Tempat Wisata Berdasarkan Biayanya </h2>
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
                        <td>Biaya</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><select name="biaya" class="form-select" required>
                                <option value="10">Biaya Kurang dari sama dengan 5000 Rupiah</option>
                                <option value="20">Biaya Kurang dari sama dengan 10000 Rupiah</option>
                                <option value="30">Biaya Kurang dari sama dengan 20000 Rupiah</option>
                                <option value="40">Biaya Kurang dari sama dengan 30000 Rupiah</option>
                                <option value="50">Biaya Lebih dari 30000 Rupiah</option>
                            </select>
                            <p class="text-danger">*Biaya disini dihitung dari harga tiket masuk wisata untuk jenis wisata Alam, Buatan dan Sejarah.
                                sedangkan untuk wisata kuliner, biaya disini dihitung dari rata - rata harga makanan dan minuman di tempat tersebut.</p>
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
                foreach (\App\Controllers\api::tampildatabiaya($selecbiayaa, $selecbiayab) as $k) : ?>
                <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['biaya'] . '</p>
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
                foreach (\App\Controllers\api::tampildatabiayabudaya($selecbiayaa, $selecbiayab) as $k) : ?>
                <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['biaya'] . '</p>
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
                foreach (\App\Controllers\api::tampildatabiayabuatan($selecbiayaa, $selecbiayab) as $k) : ?>
                <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['biaya'] . '</p>
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
                foreach (\App\Controllers\api::tampildatabiayakuliner($selecbiayaa, $selecbiayab) as $k) : ?>
        <?php echo
                    '<div class="col-sm-4 ">
                <div class="card " style="width: 20rem;">
                <img src="/img/' . $k['gambar'] . '" class="card-img-top" alt="" width="100%">
                    <div class="card-body">';
                    echo '<h5 class="card-title">' . $k['nama_wisata'] . '</h5>';
                    echo '<p class="card-text">' . $k['biaya'] . '</p>
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