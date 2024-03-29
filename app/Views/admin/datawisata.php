<?= $this->extend('layout/tamplateadmin2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">

    <h2>Daftar Wisata</h2>
    <hr>
    <div class="row">
        <div class="col">

            <a href="/menuadmin/tambahdatawisata" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="col-5">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Nama Wisata.." name="keyword" autocomplete="off">
                    <button class="btn  btn-primary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <br />
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <table class="table table-bordered table-hover">
                <tr class="info" align="center">
                    <th>#</th>
                    <th>Nama Wisata</th>
                    <th>Alamat</th>
                    <th>Jarak</th>
                    <th>Akses</th>
                    <th>Fasilitas</th>
                    <th>Kebersihan</th>
                    <th>Keamanan</th>
                    <th>Biaya</th>
                    <th>Gambar</th>
                    <th>Jenis</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php $i = 1;
                foreach ($wisata as $k) : ?>
                    <tr>
                        <th scope="row"><?= $nomor++; ?></th>
                        <td><?= $k['nama_wisata']; ?></td>
                        <td><?= $k['alamat']; ?></td>
                        <td><?= $k['jarak']; ?></td>
                        <td><?= $k['akses']; ?></td>
                        <td><?= $k['fasilitas']; ?></td>
                        <td><?= $k['kebersihan']; ?></td>
                        <td><?= $k['keamanan']; ?></td>
                        <td><?= $k['biaya']; ?></td>
                        <td><img src="/img/<?= $k['gambar']; ?>" alt="" width="100%"></td>
                        <td><?= $k['jenis_wisata']; ?></td>

                        <td>
                            <a href="/datawisata/edit/<?= $k['id_wisata']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td><a href="<?= site_url('datawisata/delete/' . $k['id_wisata']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>


                    </tr>
                <?php endforeach; ?>
            </table>
            <!-- awal -->
            <?= $pager->links('wisata', 'bootstrap_pagination'); ?>

        </div>
    </div>
    <div class="accordion" id="accordionExample" disabled>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#123" aria-expanded="false" aria-controls="collapseTwo">

                </button>
            </h2>
            <div id="123" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                <div class="accordion-body">

                    <?php $this->include('admin/bobot_alternatif_hide'); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>