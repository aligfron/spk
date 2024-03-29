<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">
    <div class="row">
        <div class="col">
            <h2>Pilih Tempat Wisata </h2>
        </div>
        <div class="col-3">
            <div class="input-group mb-3">
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Berdasarkan Kriterianya
                    </button>
                    <ul class="dropdown-menu">
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
        <div class="col-md-8">
            <form name="twisata" method="GET" action="/menuwisatawan/prosespilih">
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

                    <tr>
                        <td>Akses Kendaraan</td>
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
                        <td>Kebersihan Wisata</td>
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
    </div>
</section>
<?= $this->endSection(); ?>