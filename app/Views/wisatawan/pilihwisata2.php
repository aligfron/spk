<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div class="row">
        <div class="col">
            <h2>Hasil Pencarian Tempat Wisata </h2>
        </div>
        <div class="col-3">
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
        </div>
    </div>
    <hr>
    <div class="row">
        <h5>Wisata Alam </h5>
        <?php
        $a = \App\Controllers\api::tampildata($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab);
        $ab = \App\Controllers\api::tampildatabudaya($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab);
        $abc = \App\Controllers\api::tampildatabuatan($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab);
        $abcd = \App\Controllers\api::tampildatakuliner($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab);
        $nomor = 1;
        if ($a) {
            foreach (\App\Controllers\api::tampildata($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab) as $k) : ?>
                <br>
                <div class="col-sm-4 ">
                    <?php echo '<br>'; ?>
                    <div class="card " style="width: 18rem;">
                        <img src="/img/<?= $k['gambar']; ?>" class="card-img-top" alt="" width="100%">
                        <div class="card-body">
                            <p><strong><?= $k['1']; ?></strong> Terletak di <?= $k['2']; ?> dengan jarak sekitar <code><?= $k['3']; ?> KM</code> dari pusat kota. adapun harga tiket masuk wi......</p><br>
                            <a href="/menuwisatawan/detail/<?= $k['id_wisata']; ?>" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo '<br>'; ?>
                </div>

            <?php endforeach;
            echo '&nbsp;';
        } else {
            echo '
                <div class="alert alert-warning" role="alert">
                <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
                </div>';
        }
        echo '<br><hr>
<h5>Wisata Budaya </h5>
';
        if ($ab) {
            foreach (\App\Controllers\api::tampildatabudaya($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab) as $k) : ?>
                <br>
                <div class="col-sm-4 ">
                    <div class="card " style="width: 18rem;">
                        <img src="/img/<?= $k['gambar']; ?>" class="card-img-top" alt="" width="100%">
                        <div class="card-body">
                            <p><strong><?= $k['1']; ?></strong> Terletak di <?= $k['2']; ?> dengan jarak sekitar <code><?= $k['3']; ?> KM</code> dari pusat kota. adapun harga tiket masuk wi......</p>
                            <a href="/menuwisatawan/detail/<?= $k['id_wisata']; ?>" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo '<br>'; ?>
                </div>

            <?php endforeach;
        } else {
            echo '
                <div class="alert alert-warning" role="alert">
                <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
                </div>';
        }
        echo '<br><hr>
        <h5>Wisata Buatan </h5>
        ';

        if ($abc) {
            foreach (\App\Controllers\api::tampildatabuatan($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab) as $k) : ?>
                <br>
                <div class="col-sm-4 ">
                    <div class="card " style="width: 18rem;">
                        <img src="/img/<?= $k['gambar']; ?>" class="card-img-top" alt="" width="100%">
                        <div class="card-body">
                            <p><strong><?= $k['1']; ?></strong> Terletak di <?= $k['2']; ?> dengan jarak sekitar <code><?= $k['3']; ?> KM</code> dari pusat kota. adapun harga tiket masuk wi......</p>
                            <a href="/menuwisatawan/detail/<?= $k['id_wisata']; ?>" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo '<br>'; ?>
                </div>

            <?php endforeach;
            echo '&nbsp;';
        } else {
            echo '
                <div class="alert alert-warning" role="alert">
                <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
                </div>';
        }
        echo '<br><hr>
        <h5>Wisata Kuliner </h5>
        ';

        if ($abcd) {
            foreach (\App\Controllers\api::tampildatakuliner($selecjaraka, $selecjarakb, $akses, $hasilfasilitas, $hasilkebersihann, $hasilkeamanann, $selecbiayaa, $selecbiayab) as $k) : ?>

                <div class="col-sm-4 ">
                    <?php echo '<br>'; ?>
                    <div class="card " style="width: 18rem;">
                        <img src="/img/<?= $k['gambar']; ?>" class="card-img-top" alt="" width="100%">
                        <div class="card-body">
                            <p><strong><?= $k['1']; ?></strong> Terletak di <?= $k['2']; ?> dengan jarak sekitar <code><?= $k['3']; ?> KM</code> dari pusat kota. adapun harga tiket masuk wi......</p>
                            <a href="/menuwisatawan/detail/<?= $k['id_wisata']; ?>" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                    <?php echo '<br>'; ?>
                </div>

        <?php endforeach;
            echo '&nbsp;';
        } else {
            echo '
                <div class="alert alert-warning" role="alert">
                <p>*Tempat Wisata dengan kriteria tersebut tidak tersedia</p>
                </div>';
        } ?>
    </div>


</section>
<?= $this->endSection(); ?>