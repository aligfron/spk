<nav class="navbar navbar-expand-lg navbar-dark p-2" style="background: #66C0F8;">
    <!-- buat navbar / bg-dark : background hitam / navbar-dark : mengubah warna text menjadi putih -->
    <!-- p-2 artinya padding $spacer * 0.5 -->

    <div class="container">
        <a class="navbar-brand" href="#" style="font-size: 20px; 
    font-family: 'Poppins', sans-serif; font-weight: 600;"><i class='bx bxs-analyse'></i> SPK Pariwisata Kab. Bangkalan</a>
        <!-- kita buat logo nya terlebih dahulu tapi saat ini kita menggunakan text -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- kita membuat button toggle untuk membuat responsive -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- membuat navbar / ms-auto artinya posisi textnya akan berada di ujung kanan  -->
                <!--  mb-lg-0 artinya margin bottom : 0 -->

                <li class="nav-item">
                    <a class="nav-link" href="/menuadmin/index">Home</a>
                    <!-- membuat menu home -->
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/menuadmin/kriteria">Data Kriteria</a>

                </li>
                <li class="nav-item dropdown">
                    <!-- membuat menu dropdown -->
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Alternatif</a>
                    <ul class="dropdown-menu bg-primary">
                        <li><a class="dropdown-item" href="/menuadmin/datawisata">Alternatif</a></li>
                        <li><a class="dropdown-item" href="/menuadmin/bobotalternatif">Nilai Alternatif</a></li>
                        <li><a class="dropdown-item" href="/menuadmin/rangkingalternatif">Rangking Alternatif</a></li>
                        <li><a class="dropdown-item" href="/menuadmin/ketentuan">Ketentuan Konversi Nilai</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <!-- membuat menu dropdown -->
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= session()->get('nama_user'); ?>
                    </a>
                    <ul class="dropdown-menu" style="background: #66C0F8;">
                        <li><a class="dropdown-item" href="/menuadmin/profil">Kelola Profil <i class='bx bxs-user-check'></i></a></li>
                        <li><a class="dropdown-item" href="/login/logout">Logout <i class='bx bx-log-out-circle'></i></a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>