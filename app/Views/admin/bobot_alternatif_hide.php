<section class="home" id="home">

    <h2>Nilai Alternatif</h2>
    <hr>
    <div class="row">

        <!-- accordion -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Nilai Konversi Alternatif
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>*Dari data atribut disetiap alternatif yang telang diinputkan kemudian akan terkonversi otomatis menjadi bentuk nilai 1-5 sesuai ketentuan yang telah terlampir dihalaman Ketentuan Konversi Nilai. Berikut merupakan tabel konversi nilai alternatif yang dikelompokan sesuai jenis wisatanya</p>
                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success ">
                                    <td colspan="8" align="center">Wisata Alam</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter1() as $z) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z[0]; ?></td>
                                        <td align="center"><?= $z[1]; ?></td>
                                        <td align="center"><?= $z[2]; ?></td>
                                        <td align="center"><?= $z[3]; ?></td>
                                        <td align="center"><?= $z[4]; ?></td>
                                        <td align="center"><?= $z[5]; ?></td>
                                        <td align="center"><?= $z[6]; ?></td>

                                    </tr>
                                <?php }
                                foreach (\App\Controllers\api::max_alter1() as $z11) { ?>
                                    <tr class="table-success">
                                        <td colspan="2">Nilai Maximal</td>
                                        <td align="center"><?= $z11[0]; ?></td>
                                        <td align="center"><?= $z11[1]; ?></td>
                                        <td align="center"><?= $z11[2]; ?></td>
                                        <td align="center"><?= $z11[3]; ?></td>
                                        <td align="center"><?= $z11[4]; ?></td>
                                        <td align="center"><?= $z11[5]; ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Budaya</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter2() as $z1) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z1[0]; ?></td>
                                        <td align="center"><?= $z1[1]; ?></td>
                                        <td align="center"><?= $z1[2]; ?></td>
                                        <td align="center"><?= $z1[3]; ?></td>
                                        <td align="center"><?= $z1[4]; ?></td>
                                        <td align="center"><?= $z1[5]; ?></td>
                                        <td align="center"><?= $z1[6]; ?></td>

                                    </tr>
                                <?php }
                                foreach (\App\Controllers\api::max_alter2() as $z12) { ?>
                                    <tr class="table-success">
                                        <td colspan="2">Nilai Maximal</td>
                                        <td align="center"><?= $z12[0]; ?></td>
                                        <td align="center"><?= $z12[1]; ?></td>
                                        <td align="center"><?= $z12[2]; ?></td>
                                        <td align="center"><?= $z12[3]; ?></td>
                                        <td align="center"><?= $z12[4]; ?></td>
                                        <td align="center"><?= $z12[5]; ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Budaya</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter3() as $z3) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z3[0]; ?></td>
                                        <td align="center"><?= $z3[1]; ?></td>
                                        <td align="center"><?= $z3[2]; ?></td>
                                        <td align="center"><?= $z3[3]; ?></td>
                                        <td align="center"><?= $z3[4]; ?></td>
                                        <td align="center"><?= $z3[5]; ?></td>
                                        <td align="center"><?= $z3[6]; ?></td>

                                    </tr>
                                <?php }
                                foreach (\App\Controllers\api::max_alter3() as $z13) { ?>
                                    <tr class="table-success">
                                        <td colspan="2">Nilai Maximal</td>
                                        <td align="center"><?= $z13[0]; ?></td>
                                        <td align="center"><?= $z13[1]; ?></td>
                                        <td align="center"><?= $z13[2]; ?></td>
                                        <td align="center"><?= $z13[3]; ?></td>
                                        <td align="center"><?= $z13[4]; ?></td>
                                        <td align="center"><?= $z13[5]; ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Budaya</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter4() as $z4) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z4[0]; ?></td>
                                        <td align="center"><?= $z4[1]; ?></td>
                                        <td align="center"><?= $z4[2]; ?></td>
                                        <td align="center"><?= $z4[3]; ?></td>
                                        <td align="center"><?= $z4[4]; ?></td>
                                        <td align="center"><?= $z4[5]; ?></td>
                                        <td align="center"><?= $z4[6]; ?></td>

                                    </tr>
                                <?php }
                                foreach (\App\Controllers\api::max_alter4() as $z14) { ?>
                                    <tr class="table-success">
                                        <td colspan="2">Nilai Maximal</td>
                                        <td align="center"><?= $z14[0]; ?></td>
                                        <td align="center"><?= $z14[1]; ?></td>
                                        <td align="center"><?= $z14[2]; ?></td>
                                        <td align="center"><?= $z14[3]; ?></td>
                                        <td align="center"><?= $z14[4]; ?></td>
                                        <td align="center"><?= $z14[5]; ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Normalisasi Nilai Alternatif
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Alam</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter1() as $z) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z[0]; ?></td>
                                        <?php $h1 = $z[1] / $z11[0]; ?>
                                        <td align="center"><?= $h1 ?></td>
                                        <?php $h2 = $z[2] / $z11[1]; ?>
                                        <td align="center"><?= $h2 ?></td>
                                        <?php $h3 = $z[3] / $z11[2]; ?>
                                        <td align="center"><?= $h3 ?></td>
                                        <?php $h4 = $z[4] / $z11[3]; ?>
                                        <td align="center"><?= $h4 ?></td>
                                        <?php $h5 = $z[5] / $z11[4]; ?>
                                        <td align="center"><?= $h5 ?></td>
                                        <?php $h6 = $z[6] / $z11[5]; ?>
                                        <td align="center"><?= $h6 ?></td>

                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $id = $z['7'];
                                    $q = $db->prepare("UPDATE normalisasi_alternatif SET normalisasi1='$h1', normalisasi2='$h2',normalisasi3='$h3',normalisasi4='$h4',normalisasi5='$h5',normalisasi6='$h6' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>



                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Budaya</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter2() as $z1) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z1[0]; ?></td>
                                        <?php $h11 = $z1[1] / $z12[0]; ?>
                                        <td align="center"><?= $h11 ?></td>
                                        <?php $h22 = $z1[2] / $z12[1]; ?>
                                        <td align="center"><?= $h22 ?></td>
                                        <?php $h33 = $z1[3] / $z12[2]; ?>
                                        <td align="center"><?= $h33 ?></td>
                                        <?php $h44 = $z1[4] / $z12[3]; ?>
                                        <td align="center"><?= $h44 ?></td>
                                        <?php $h55 = $z1[5] / $z12[4]; ?>
                                        <td align="center"><?= $h55 ?></td>
                                        <?php $h66 = $z1[6] / $z12[5]; ?>
                                        <td align="center"><?= $h66 ?></td>
                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $id = $z1['7'];
                                    $q = $db->prepare("UPDATE normalisasi_alternatif SET normalisasi1='$h11', normalisasi2='$h22',normalisasi3='$h33',normalisasi4='$h44',normalisasi5='$h55',normalisasi6='$h66' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Buatan</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter3() as $z3) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z3[0]; ?></td>
                                        <?php $h111 = $z3[1] / $z13[0]; ?>
                                        <td align="center"><?= $h111 ?></td>
                                        <?php $h222 = $z3[2] / $z13[1]; ?>
                                        <td align="center"><?= $h222 ?></td>
                                        <?php $h333 = $z3[3] / $z13[2]; ?>
                                        <td align="center"><?= $h333 ?></td>
                                        <?php $h444 = $z3[4] / $z13[3]; ?>
                                        <td align="center"><?= $h444 ?></td>
                                        <?php $h555 = $z3[5] / $z13[4]; ?>
                                        <td align="center"><?= $h555 ?></td>
                                        <?php $h666 = $z3[6] / $z13[5]; ?>
                                        <td align="center"><?= $h666 ?></td>

                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $id = $z3['7'];
                                    $q = $db->prepare("UPDATE normalisasi_alternatif SET normalisasi1='$h111', normalisasi2='$h222',normalisasi3='$h333',normalisasi4='$h444',normalisasi5='$h555',normalisasi6='$h666' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Kuliner</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter4() as $z4) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z4[0]; ?></td>
                                        <?php $h1111 = $z4[1] / $z14[0]; ?>
                                        <td align="center"><?= $h1111 ?></td>
                                        <?php $h2222 = $z4[2] / $z14[1]; ?>
                                        <td align="center"><?= $h2222 ?></td>
                                        <?php $h3333 = $z4[3] / $z14[2]; ?>
                                        <td align="center"><?= $h3333 ?></td>
                                        <?php $h4444 = $z4[4] / $z14[3]; ?>
                                        <td align="center"><?= $h4444 ?></td>
                                        <?php $h5555 = $z4[5] / $z14[4]; ?>
                                        <td align="center"><?= $h5555 ?></td>
                                        <?php $h6666 = $z4[6] / $z14[5]; ?>
                                        <td align="center"><?= $h6666 ?></td>

                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $id = $z4['7'];
                                    $q = $db->prepare("UPDATE normalisasi_alternatif SET normalisasi1='$h1111', normalisasi2='$h2222',normalisasi3='$h3333',normalisasi4='$h4444',normalisasi5='$h5555',normalisasi6='$h6666' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Perkalian Normalisasi Alternatif X Bobot Kriteria
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>*Langkah Terakhir ialah mengkalikan nilai prioritas kriteria dengan nilai hasil normalisasi alternatif yang sesuai, setelah itu hasil perkalian tersebut dijumlahkan perbaris dan dari jumlah tersebut digunakan sebagai acuan untuk menentukan rangking wisata</p>
                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Alam</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $data_normalisasi = array();
                                $data_hasil = array();
                                $No = 1;
                                foreach (\App\Controllers\api::nilai_alter1() as $z) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z[0]; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot1();
                                        $alam1 = ($z[1] / $z11[0]) * $w[0]; ?>
                                        <td align="center"><?= $alam1;  ?> </td>
                                        <?php $w = \App\Controllers\api::perkalianbobot2();
                                        $alam2 = ($z[2] / $z11[1]) * $w[0]; ?>
                                        <td align="center"><?= $alam2; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot3();
                                        $alam3 = ($z[3] / $z11[2]) * $w[0]; ?>
                                        <td align="center"><?= $alam3; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot4();
                                        $alam4 = ($z[4] / $z11[3]) * $w[0]; ?>
                                        <td align="center"><?= $alam4; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot5();
                                        $alam5 = ($z[5] / $z11[4]) * $w[0]; ?>
                                        <td align="center"><?= $alam5; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot6();
                                        $alam6 = ($z[6] / $z11[5]) * $w[0]; ?>
                                        <td align="center"><?= $alam6; ?></td>

                                    </tr>

                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $hasilalam = $alam1 + $alam2 + $alam3 + $alam4 + $alam5 + $alam6;
                                    $id = $z['7'];
                                    $q = $db->prepare("UPDATE hasil_perhitungan SET jumlah='$hasilalam' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Budaya</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter2() as $z1) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z1[0]; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot1();
                                        $budaya1 =  ($z1[1] / $z12[0]) * $w[0]; ?>
                                        <td align="center"><?= $budaya1; ?> </td>
                                        <?php $w = \App\Controllers\api::perkalianbobot2();
                                        $budaya2 =  ($z1[2] / $z12[1]) * $w[0]; ?>
                                        <td align="center"><?= $budaya2; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot3();
                                        $budaya3 =  ($z1[3] / $z12[2]) * $w[0]; ?>
                                        <td align="center"><?= $budaya3; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot4();
                                        $budaya4 =  ($z1[4] / $z12[3]) * $w[0]; ?>
                                        <td align="center"><?= $budaya4; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot5();
                                        $budaya5 =  ($z1[5] / $z12[4]) * $w[0]; ?>
                                        <td align="center"><?= $budaya5; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot6();
                                        $budaya6 =  ($z1[6] / $z12[5]) * $w[0]; ?>
                                        <td align="center"><?= $budaya6; ?></td>

                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $hasilbudaya = $budaya1 + $budaya2 + $budaya3 + $budaya4 + $budaya5 + $budaya6;
                                    $id = $z1['7'];
                                    $q = $db->prepare("UPDATE hasil_perhitungan SET jumlah='$hasilbudaya' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Buatan</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter3() as $z3) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z3[0]; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot1();
                                        $Buatan1 =  ($z3[1] / $z13[0]) * $w[0]; ?>
                                        <td align="center"><?= $Buatan1; ?> </td>
                                        <?php $w = \App\Controllers\api::perkalianbobot2();
                                        $Buatan2 =  ($z3[2] / $z13[1]) * $w[0]; ?>
                                        <td align="center"><?= $Buatan2; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot3();
                                        $Buatan3 =  ($z3[3] / $z13[2]) * $w[0]; ?>
                                        <td align="center"><?= $Buatan3; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot4();
                                        $Buatan4 =  ($z3[4] / $z13[3]) * $w[0]; ?>
                                        <td align="center"><?= $Buatan4; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot5();
                                        $Buatan5 =  ($z3[5] / $z13[4]) * $w[0]; ?>
                                        <td align="center"><?= $Buatan5; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot6();
                                        $Buatan6 =  ($z3[6] / $z13[5]) * $w[0]; ?>
                                        <td align="center"><?= $Buatan6; ?></td>

                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $hasilbuatan = $Buatan1 + $Buatan2 + $Buatan3 + $Buatan4 + $Buatan5 + $Buatan6;
                                    $id = $z3['7'];
                                    $q = $db->prepare("UPDATE hasil_perhitungan SET jumlah='$hasilbuatan' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>

                        <table class="table table-bordered w-auto table-sm">
                            <thead>
                                <tr class="table-success">
                                    <td colspan="8" align="center">Wisata Kuliner</td>
                                </tr>
                                <tr class="info">
                                    <td vertical-align="middle">NO</td>
                                    <td vertical-align="middle">Nama Alternatif</td>
                                    <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                                        <td align="center"><?= $x[1], '<br>(' . $x[2] . ')'; ?></td>
                                    <?php } ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $No = 1;
                                foreach (\App\Controllers\api::nilai_alter4() as $z4) { ?>
                                    <tr>
                                        <td><?= $No++; ?></td>
                                        <td><?= $z4[0]; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot1();
                                        $kuliner1 =  ($z4[1] / $z14[0]) * $w[0]; ?>
                                        <td align="center"><?= $kuliner1; ?> </td>
                                        <?php $w = \App\Controllers\api::perkalianbobot2();
                                        $kuliner2 =  ($z4[2] / $z14[1]) * $w[0]; ?>
                                        <td align="center"><?= $kuliner2; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot3();
                                        $kuliner3 =  ($z4[3] / $z14[2]) * $w[0]; ?>
                                        <td align="center"><?= $kuliner3; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot4();
                                        $kuliner4 =  ($z4[4] / $z14[3]) * $w[0]; ?>
                                        <td align="center"><?= $kuliner4; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot5();
                                        $kuliner5 =  ($z4[5] / $z14[4]) * $w[0]; ?>
                                        <td align="center"><?= $kuliner5; ?></td>
                                        <?php $w = \App\Controllers\api::perkalianbobot6();
                                        $kuliner6 =  ($z4[6] / $z14[5]) * $w[0]; ?>
                                        <td align="center"><?= $kuliner6; ?></td>

                                    </tr>
                                <?php

                                    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                                    $hasilkuliner = $kuliner1 + $kuliner2 + $kuliner3 + $kuliner4 + $kuliner5 + $kuliner6;
                                    $id = $z4['7'];
                                    $q = $db->prepare("UPDATE hasil_perhitungan SET jumlah='$hasilkuliner' WHERE id_wisata='$id'");
                                    $q->execute();
                                } ?>

                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>