<?= $this->include('admin\Matrix'); ?>
<div class="accordion-item">
    <h2 class="accordion-header">
        <button disabled class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#123" aria-expanded="false" aria-controls="collapseTwo">

        </button>
    </h2>
    <div id="123" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
        <div class="accordion-body">
            <h5>Tabel Matrix Perbandingan</h5>
            <table class="table table-bordered w-auto">
                <thead>
                    <tr class="info">
                        <td></td>
                        <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                            <td><?= $x[1]; ?></td>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $xx = 0;
                    $data_matrix = array();
                    foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                        <tr>
                            <td><?= $x[1]; ?></td>
                            <?php
                            $yy = 0;
                            foreach (\App\Controllers\api::data_kriteria()  as $y) {
                                $data_matrix[$xx][$yy] = \App\Controllers\api::bobot_kriteria_wisatawan($x['0'], $y['0'])['nilai'];
                                echo "<td class=\"text-center\">" . (\App\Controllers\api::bobot_kriteria_wisatawan($x['0'], $y['0'])['nilai']) . "</td>";
                                $yy++;
                            }
                            ?>
                        </tr>

                    <?php
                        $xx++;
                    }
                    $matrix = new Math_Matrix($data_matrix);
                    echo '<tr><th>JUMLAH</th>';
                    for ($x1 = 0; $x1 < $matrix->getSize()[1]; $x1++) { //loop sebanyak jml data di baris (banyaknya kolom)
                        echo '<th class="text-center">' . array_sum($matrix->getCol($x1)) . '</th>';
                    } ?>
                </tbody>
            </table><br>
            <h5>Tabel Normalisasi Matrix Perbandingan</h5>
            <table class="table table-bordered w-auto">
                <thead>
                    <tr class="info">
                        <td></td>
                        <?php foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                            <td><?= $x[1]; ?></td>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $xx = 0;
                    $data_matrix = array();
                    foreach (\App\Controllers\api::data_kriteria() as $x) { ?>
                        <tr>
                            <td><?= $x[1]; ?></td>
                            <?php
                            $yy = 0;
                            foreach (\App\Controllers\api::data_kriteria()  as $y) {
                                $data_matrix[$xx][$yy] = \App\Controllers\api::bobot_kriteria_wisatawan($x['0'], $y['0'])['nilai'] / array_sum($matrix->getCol($yy));
                                echo "<td class=\"text-center\">" . (\App\Controllers\api::bobot_kriteria_wisatawan($x['0'], $y['0'])['nilai'] / array_sum($matrix->getCol($yy))) . "</td>";
                                $yy++;
                            }
                            ?>
                        </tr>

                    <?php
                        $xx++;
                    }
                    $matrix_norm = new Math_Matrix($data_matrix);
                    echo '<tr><th>JUMLAH</th>';
                    for ($x = 0; $x < $matrix_norm->getSize()[1]; $x++) { //loop sebanyak jml data di baris (banyaknya kolom)
                        echo '<th class="text-center">' . array_sum($matrix_norm->getCol($x)) . '</th>';
                    } ?>
                </tbody>
            </table><br>

            <?php
            echo '<hr><h6>Prioritas/Hasil bobot</h6><table class="table table-bordered table-sm table-striped">';
            $bobot = array();
            $kriteria = \App\Controllers\api::data_kriteria();
            $data_matrix = array();
            for ($x = 0; $x < count($kriteria); $x++) {
                $b = array_sum($matrix_norm->getRow($x)) / count($matrix_norm->getRow($x));
                $data_matrix[$x][0] = $b;
                echo "<tr><th>{$kriteria[$x][1]}</th><td>$b</td></tr>";
            }
            echo '</table>';
            $matrix_eign = new Math_Matrix($data_matrix);

            $mul_mat = new Math_Matrix($matrix->getData());
            $mul_mat->multiply($matrix_eign);


            echo '<hr><h6>Perhitungan Konsistensi</h6><table class="table table-bordered table-sm table-striped">';
            echo '<th>Kriteria</th><th>Perkalian Matrix</th><th>Perkalian/Bobot</th>';
            $kriteria = \App\Controllers\api::data_kriteria();
            $data_matrix = array();
            $jml = 0;
            for ($x = 0; $x < count($kriteria); $x++) {
                $t = $mul_mat->getData()[$x][0] / $matrix_eign->getData()[$x][0];
                $jml += $t;
                echo "<tr><td>{$kriteria[$x][1]}</td><td>{$mul_mat->getData()[$x][0]}</td><td>$t</td></tr>";
            }
            echo '</table>';

            $t = 1 / count($kriteria) * $jml;
            echo 't = 1/' . count($kriteria) . '*' . $jml . ' = ' . $t . '<br>';
            $ci = ($t - count($kriteria)) / (count($kriteria) - 1);
            echo "CI = ($t-" . count($kriteria) . ')/' . (count($kriteria) - 1) . ' = ' . $ci . '<br>';
            $ri = array(
                1 => 0,
                2 => 0,
                3 => 0.58,
                4 => 0.90,
                5 => 1.12,
                6 => 1.24,
                7 => 1.32,
                8 => 1.41,
                9 => 1.45,
                10 => 1.49,
                11 => 1.51,
                12 => 1.48,
                13 => 1.56,
                14 => 1.57,
                15 => 1.59
            );
            ?>

        </div>
    </div>
</div>
<br>
<?php
$id = session()->get('userid');
$cr = $ci / $ri[count($kriteria)];
if ($cr <= 0.10) {
    $ok = " <span class=\"bg-primary text-white\">[OKE/KONSISTEN]</span>";

    //memasukkan ke database
    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
    for ($x = 0; $x < count($kriteria); $x++) {
        $b = $matrix_eign->getData()[$x][0];
        $idk = $kriteria[$x][0];
        $q = $db->prepare("UPDATE bobot_kriteria_wisatawan SET bobot='$b' WHERE id_kriteria1='$idk' and id_wisatawan='$id'");
        $q->execute();
    }
    echo "Konsistensi Rasio Dinyatakan $ok";
    echo $this->include('wisatawan/rangkingalam');
} else {
    $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
    $ok = " <span class=\"bg-danger text-white\">[BERMASALAH/TIDAK KONSISTEN]</span>";
    $q = $db->prepare("UPDATE bobot_kriteria_wisatawan SET bobot=NULL WHERE id_wisatawan='$id'");
    $q->execute();
    echo "Konsistensi Rasio Dinyatakan $ok";
    echo "<br>Silahkan Isi ulang nilai perbandingan kriteria";
}


?>