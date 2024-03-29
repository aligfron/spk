<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">
    <div class="row">
        <div class="col">
            <h2>Detail Wisata</h2>
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
        <div class="col-5">
            <img src="/img/<?= $wisatadetail['gambar']; ?>" class="img-fluid" alt="...">
            <br><br>
        </div>
        <div class="col-5">
            <h3><?= $wisatadetail['nama_wisata']; ?></h3>
            <br>
            <p><strong>Wisata <?= $wisatadetail['nama_wisata']; ?></strong> terletak di <?= $wisatadetail['alamat']; ?> dengan jarak sekitar <?= $wisatadetail['jarak']; ?> KM dari pusat kota kab. bangkalan. adapun biaya yang perlu disiapkan untuk berkunjung ke wisata ini sebesar <?= $wisatadetail['biaya']; ?> Rupiah.
                <br>
                <hr>Adapun beberapa poin yang tersedia di wisata ini ialah

                <br>Fasilitas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $wisatadetail['fasilitas']; ?>
                <br>Keamanan &nbsp;: <?= $wisatadetail['keamanan']; ?>
                <br>Kebersihan &nbsp;: <?= $wisatadetail['kebersihan']; ?>
                <br>adapun wisata ini dapat ditempuh oleh <?= $wisatadetail['akses']; ?>
            </p>
        </div>
    </div>

</section>
<?= $this->endSection(); ?>