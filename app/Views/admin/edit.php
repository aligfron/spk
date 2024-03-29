<?= $this->extend('layout/tamplateadmin2'); ?>
<?= $this->section('content'); ?>

<!-- Home section -->
<section class="home" id="home">

    <h2>Edit Data Wisata</h2>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <form name="twisata" method="POST" action="/datawisata/update/<?= $wisata['id_wisata']; ?> " enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td>Nama Wisata</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="namawisata" class="form-control" required autocomplete="off" autofocus value="<?= $wisata['nama_wisata']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="alamat" class="form-control" required autocomplete="off" value="<?= $wisata['alamat']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Jarak (KM)</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="number" name="jarak" class="form-control" required autocomplete="off" value="<?= $wisata['jarak']; ?>">
                            <p class="text-danger">*Jarak disini dihitung dari Pusat Kota Bangkalan yaitu Taman Rekreasi Kota</p>
                        </td>
                    </tr>

                    <tr>
                        <td>Akses</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <select name="akses" class="form-select" required>
                                <option value="<?= $wisata['akses']; ?>"><?= $wisata['akses']; ?></option>
                                <option value="Dapat di Akses Semua Transportasi">Dapat di Akses Semua Transportasi</option>
                                <option value="Kendaraan pribadi roda 4 dan 2">Kendaraan pribadi roda 4 dan 2</option>
                                <option value="kendaraan roda 4 di sambung dengan kendaraan roda 2">kendaraan roda 4 di sambung dengan kendaraan roda 2</option>
                                <option value="Hanya Kendaraan pribadi roda 2">Hanya Kendaraan pribadi roda 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fasilitas</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <input type="checkbox" name="fasilitas[1]" value="Toilet" <?php in_array('Toilet', $checked4) ? print "checked" : ""; ?>>
                            <label> Toilet</label><br>
                            <input type="checkbox" name="fasilitas[2]" value="Area Parkir" <?php in_array('Area Parkir', $checked4) ? print "checked" : ""; ?>>
                            <label> Area Parkir</label><br>
                            <input type="checkbox" name="fasilitas[3]" value="Tempat Ibadah" <?php in_array('Tempat Ibadah', $checked4) ? print "checked" : ""; ?>>
                            <label> Tempat Ibadah</label><br>
                            <input type="checkbox" name="fasilitas[4]" value="Kantin atau Rumah makan" <?php in_array('Kantin atau Rumah makan', $checked4) ? print "checked" : ""; ?>>
                            <label> Kantin atau Rumah makan</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Kebersihan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <input type="checkbox" name="kebersihan[1]" value="Kondisi Lingkungan Bersih" <?php in_array('Kondisi Lingkungan Bersih', $checked2) ? print "checked" : ""; ?>>
                            <label>Kondisi Lingkungan Bersih</label><br>
                            <input type="checkbox" name="kebersihan[2]" value="Terdapat Tempat Sampah" <?php in_array('Terdapat Tempat Sampah', $checked2) ? print "checked" : ""; ?>>
                            <label>Terdapat Tempat Sampah</label><br>
                            <input type="checkbox" name="kebersihan[3]" value="Terdapat Petugas Kebersihan" <?php in_array('Terdapat Petugas Kebersihan', $checked2) ? print "checked" : ""; ?>>
                            <label>Terdapat Petugas Kebersihan</label><br>

                        </td>
                    </tr>
                    <tr>
                        <td>Keamanan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <input type="checkbox" name="keamanan[1]" value="Akses menuju tempat wisata aman dari kejahatan atau pungli" <?php in_array('Akses menuju tempat wisata aman dari kejahatan atau pungli', $checked3) ? print "checked" : ""; ?>>
                            <label>Akses menuju tempat wisata aman dari kejahatan atau pungli</label><br>
                            <input type="checkbox" name="keamanan[2]" value="Terdapat CCTV" <?php in_array('Terdapat CCTV', $checked3) ? print "checked" : ""; ?>>
                            <label>Terdapat CCTV</label><br>
                            <input type="checkbox" name="keamanan[3]" value="Terdapat satpam atau penjaga" <?php in_array('Terdapat satpam atau penjaga', $checked3) ? print "checked" : ""; ?>>
                            <label>Terdapat satpam atau penjaga</label><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Wisata</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <select name="jenis" class="form-select" required>
                                <option value="<?= $wisata['jenis_wisata']; ?>"><?= $wisata['jenis_wisata']; ?></option>

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
                        <td><input type="number" name="biaya" class="form-control" required autocomplete="off" value="<?= $wisata['biaya']; ?>">
                            <p class="text-danger">*Biaya disini diisi dengan harga dari tiket masuk wisata dari jenis wisata Alam, Buatan dan Sejarah.
                                sedangkan untuk wisata kuliner, biaya disini diisi denggan rata - rata harga makanan dan minuman di tempat tersebut.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Pilih Gambar</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" id="gambar" name="gambar" accept='image/*' required />
                                    <label class="custom-file-label" for="gambar"><?= $wisata['gambar']; ?></label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="dbarang" Value="Edit" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>
</section>


<?= $this->endSection(); ?>