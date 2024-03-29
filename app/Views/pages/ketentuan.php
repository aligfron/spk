<?= $this->extend('layout/tamplate'); ?>
<?= $this->section('content'); ?>
<section class="home" id="home">
    <h1>
        <strong>Ketentuan Konversi Nilai</strong> <i class='bx bxs-analyse'></i>
    </h1>
    <hr>
    <div class="container text-center">
        <div class="row align-items-start">
            <div class="col">
                <img src="/img/Capture.PNG" width="100%">
            </div>
            <div class="col" align="justify">
                <small>Pada tabel disamping menjelaskan kriteria apa saja yang digunakan pada penelitian ini. </small>
                <br><small align="justify">*Kriteria jarak dihitung dari pusat kota Bangkalan yaitu Alun-alun kota Bangkalan ke lokasi wisata. Semakin jauh jarak lokasi wisata, maka nilainya akan semakin kecil. </small>
                <br><small align="justify">*terdapat empat indikator yang menjadi penilaian pada kriteria fasilitas ini antara lain Toilet bersih, terdapat tempat ibadah, memiliki area parkir, dan memiliki warung atau rumah makan. Apabila dari tempat wisata tersebut memiliki semua atau empat fasilitas tersebut, maka nilainya lima. Apabila hanya terdapat tiga fasilitas maka nilainya empat. Apabila hanya terdapat dua fasilitas, maka nilainya tiga. Apabila hanya terdapat satu fasilitas saja, maka nilainya dua. Apabila tidak terdapat fasilitas di tempat wisata, maka nilainya satu.</small>
                <br><small align="justify">*terdapat tiga indikator yang menjadi penilaian pada kriteria kebesihan antara lain kondisi lingkungan, terdapat petugas kebersihan dan terdapat tempat sampah. Apabila dari tempat wisata tersebut memiliki semua indikator tersebut, maka nilainya lima. Apabila hanya terdapat dua nilainya, maka nilainya empat. Apabila hanya terdapat satu indikator saja, maka nilainya tiga. Apabila tidak terdapat indikator kebersihan di tempat wisata, maka nilainya dua</small>
                <br><small align="justify">*terdapat tiga indikator yang menjadi penilaian pada kriteria keamanan antara lain terdapat satpam atau penjaga, akses menuju tempat wisata yang aman dari kejahatan atau pungli dan terdapat cctv. Apabila dari tempat wisata tersebut memiliki semua indikator tersebut, maka nilainya empat. Apabila hanya terdapat dua indikator, maka nilainya tiga. Apabila hanya terdapat satu indikator saja, maka nilainya dua. Apabila tidak terdapat indikator kebersihan di tempat wisata, maka nilainya satu </small>
                <br><small align="justify">*Kriteria Biaya untuk Jenis wisata alam, sejarah dan buatan, kriteria biaya disini menghitung dari harga tiket masuk. semakin besar harga tiket masuk, maka nilainya juga akan semakin kecil. Sedangkan untuk Jenis wisata Kuliner, kriteria biaya disini menghitung dari harga rata-rata makanan dan minuman. semakin besar harganya, maka nilainya juga akan semakin kecil. </small>
                <br><small align="justify">Dari data alternatif tersebut, selanjutnya dikonversikan menjadi bentuk nomerik sesuai kecocokan alternatif terhadap kriteria pada tabel disamping</small>
                <br><br><br>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection(); ?>