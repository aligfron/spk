<?= $this->extend('layout/tamplate'); ?>
<!-- Home section -->
<?= $this->section('content'); ?>
<section class="home" id="home">
    <h1 class="text-white">
        <strong>TENTANG</strong> <i class='bx bxs-analyse'></i>
    </h1>
    <hr class="text-white">
    <h5 class="text-white">
        WEB SPK PEMILIHAN WISATA KAB. BANGKALAN </h1>
        <p align="justify" class="text-white ">Merupakan sebuah sistem yang dapat membantu Wisatawan untuk menentukan tujuan wisata terbaik berdasarkan 6 kriteria yang telah ditentukan yaitu : Jarak, Akses Kendaraan, Fasilitas, Keamanan, Kebersihan dan Biaya.
            terdapat 68 tempat wisata yang dikelompokkan berdasarkan jenis wisatanya yaitu kelompok jenis wisata alam, wisata sejarah, wisata buatan dan wisata alam.
            <br><br>Metode spk yang digunakan dalam sistem ini ialah kombinasi metode AHP dan SAW. Metode AHP digunakan untuk mendapatkan bobot kriteria berdasarkan prioritas pengguna, sedangkan SAW digunakan untuk normalisasi nilai semua alternatif.
            <br><a href="/Home/ketentuan">Lihat Ketentuan dari kriteria dan alternatif pada sistem ini >></a>
        </p><br><br>
        <hr class="text-white">
        <p align="justify" class="text-white ">Program oleh Dinas Pariwisata dan Kebudayaan Kabupaten Bangkalan<br>Jl. Sukarno Hatta No. 39A Kabupaten Bangkalan</p>

        <div class="list">
            <h4>Contact</h4>
            <div class="social">
                <a href="https://www.instagram.com/disbudparbangkalan/"><i class='bx bxl-instagram'></i></a>
                <a href="http://disbudpar.bangkalankab.go.id."><i class='bx bx-world'></i></a>
                <a href="https://maps.app.goo.gl/TQptdmSxy25aLhs37"><i class='bx bx-location-plus'></i></a>
            </div>
        </div>
</section>

<?= $this->endSection(); ?>