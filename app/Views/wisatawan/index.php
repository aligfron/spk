<?= $this->extend('layout/tamplatewisatawan'); ?>
<?= $this->section('content'); ?>


<!-- Home section -->
<section class="home" id="home">
    <div class="home-text">
        <?php if (session()->getFlashdata('login')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hollo <?= session()->get('nama_user'); ?>!</strong> <?= session()->getFlashdata('login'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <h1>SELAMAT <br> DATANG <?= session()->get('nama_user'); ?></h1>
        <?php $idlevel = session()->get('idlevel');
        if ($idlevel == 1) {
            $tampil = 'ADMIN';
        } else {
            $tampil = 'WISATAWAN';
        }
        ?>
        <p>DI SISTEM PENDUKUNG KEPUTUSAN <br>SEBAGAI : <?= $tampil; ?><br>Dinas Kebudayaan & Pariwisata Kab. Bangkalan, Jawa Timur</p>
        <!-- Example single danger button -->

    </div>
    <a href="/menuwisatawan/pilihwisata" class="btn btn-primary ">
        Pilih Tempat Wisata
    </a>


</section>





<?= $this->endSection(); ?>