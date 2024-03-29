<?= $this->extend('layout/tamplateadmin2'); ?>
<?= $this->section('content'); ?>
<?php
$nextid = $query1['id_wisata'] + 1;
?>
<!-- Home section -->
<section class="home" id="home">

    <h2>Tambah Data Wisata</h2>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <form name="twisata" method="POST" action="/datawisata/prosestambahwisata" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td>ID Wisata</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="idwisata" class="form-control" required autocomplete="off" readonly value="<?= $nextid  ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama Wisata</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="namawisata" class="form-control" required autocomplete="off" autofocus></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="alamat" class="form-control" required autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>Jarak (KM)</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="number" step="any" name="jarak" class="form-control" required autocomplete="off">

                            <p class="text-danger">*Jarak disini dihitung dari Pusat Kota Bangkalan yaitu Taman Rekreasi Kota</p>
                        </td>
                    </tr>
                    <tr>

                    <tr>
                        <td>Akses</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <select name="akses" class="form-select" required>
                                <option value="Dapat di Akses Semua Transportasi">Dapat di Akses Semua Transportasi</option>
                                <option value="Kendaraan pribadi roda 4 dan 2">Kendaraan pribadi roda 4 dan 2</option>
                                <option value="kendaraan roda 4 di sambung dengan kendaraan roda 2">kendaraan roda 4 di sambung dengan kendaraan roda 2</option>
                                <option value="Hanya Kendaraan pribadi roda 2">Hanya Kendaraan pribadi roda 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebersihan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <input type="checkbox" name="kebersihan[1]" value="Kondisi Lingkungan Bersih">
                            <label>Kondisi Lingkungan Bersih</label><br>
                            <input type="checkbox" name="kebersihan[2]" value="Terdapat Tempat Sampah">
                            <label>Terdapat Tempat Sampah</label><br>
                            <input type="checkbox" name="kebersihan[3]" value="Terdapat Petugas Kebersihan">
                            <label>Terdapat Petugas Kebersihan</label><br>

                        </td>
                    </tr>


                    <tr>
                        <td>Fasilitas</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <input type="checkbox" name="fasilitas[1]" value="Toilet">
                            <label> Toilet</label><br>
                            <input type="checkbox" name="fasilitas[2]" value="Area Parkir">
                            <label> Area Parkir</label><br>
                            <input type="checkbox" name="fasilitas[3]" value="Tempat Ibadah">
                            <label> Tempat Ibadah</label><br>
                            <input type="checkbox" name="fasilitas[4]" value="Kantin atau Rumah makan">
                            <label> Kantin atau Rumah makan</label><br>
                        </td>
                    </tr>
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
                        <td>Jenis Wisata</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <select name="jenis" class="form-select" required>
                                <option value="Wisata Alam">Wisata Alam</option>
                                <option value="Wisata Budaya">Wisata Budaya</option>
                                <option value="Wisata Buatan">Wisata Buatan</option>
                                <option value="Wisata Kuliner">Wisata Kuliner</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Biaya</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="number" name="biaya" class="form-control" required autocomplete="off">
                            <p class="text-danger">*Biaya disini diisi dengan harga dari tiket masuk wisata dari jenis wisata Alam, Buatan dan Sejarah.
                                sedangkan untuk wisata kuliner, biaya disini diisi denggan rata - rata harga makanan dan minuman di tempat tersebut.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Pilih Gambar</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="gambar" name="gambar" accept='image/*' required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="dbarang" Value="Tambah" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>
</section>


<?= $this->endSection(); ?>