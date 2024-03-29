<?= $this->include('admin\apikriteria');
?>
<?php

$bobotObj = new apikriteria();
$count = $bobotObj->countAll();
?>

<!-- hahhaaha -->
<h5>Tabel Matrix Perbandingan</h5>
<p>*setelah memilih nilai perbandingan, maka nilia tersebut akan dikonvert dalam bentuk tabel matrix seperti dibawah ini.</p>

<table width="100%" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Antar Kriteria</th>
            <?php $bobots1 = $bobotObj->readAll2();
            while ($row = $bobots1->fetch(PDO::FETCH_ASSOC)) : ?>
                <th><?= $row['nama_kriteria'] ?></th>
            <?php endwhile; ?>
        </tr>
    </thead>
    <tbody>
        <?php $bobots2 = $bobotObj->readAll2();
        while ($baris = $bobots2->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <th class="active"><?= $baris['nama_kriteria'] ?></th>
                <?php $bobots3 = $bobotObj->readAll2();
                while ($kolom = $bobots3->fetch(PDO::FETCH_ASSOC)) : ?>
                    <td>
                        <?php
                        if ($baris['id_kriteria11'] == $kolom['id_kriteria11']) {
                            echo '1';
                            if ($bobotObj->insert($baris['id_kriteria11'], '1', $kolom['id_kriteria11'])) {
                                // ...
                            } else {
                                $bobotObj->update($baris['id_kriteria11'], '1', $kolom['id_kriteria11']);
                            }
                        } else {
                            $bobotObj->readAll1($baris['id_kriteria11'], $kolom['id_kriteria11']);
                            echo number_format($bobotObj->kp, 4, '.', ',');
                        }
                        ?>
                    </td>
                <?php endwhile; ?>
            </tr>
        <?php endwhile; ?>
    </tbody>
    <tfoot>
        <tr class="info">
            <th>Jumlah</th>
            <?php $stmt5 = $bobotObj->readAll2();
            while ($row = $stmt5->fetch(PDO::FETCH_ASSOC)) : ?>
                <th>
                    <?php
                    $bobotObj->readSum1($row['id_kriteria11']);
                    echo number_format($bobotObj->nak, 4, '.', ',');
                    $bobotObj->insert3($bobotObj->nak, $row['id_kriteria11']);
                    ?>
                </th>
            <?php endwhile; ?>
        </tr>
    </tfoot>
</table>
<br>
<h5>Tabel Normalisasi Matrix Perbandingan</h5>
<p>*selanjutnya dari tabel matrix diatas dilakukan normalisasi dari setiap nilai</p>
<table width="100%" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Normalisasi</th>
            <?php $bobots1x = $bobotObj->readAll2();
            while ($row2x = $bobots1x->fetch(PDO::FETCH_ASSOC)) : ?>
                <th><?= $row2x['nama_kriteria'] ?></th>
            <?php endwhile; ?>
            <th class="info">Jumlah</th>
            <th class="success">Prioritas</th>
        </tr>
    </thead>
    <tbody>
        <?php $bobots2x = $bobotObj->readAll2();
        while ($baris = $bobots2x->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <th class="active"><?= $baris['nama_kriteria'] ?></th>
                <?php $stmt4x = $bobotObj->readAll2();
                while ($kolom = $stmt4x->fetch(PDO::FETCH_ASSOC)) : ?>
                    <td>
                        <?php
                        if ($baris['id_kriteria11'] == $kolom['id_kriteria11']) {
                            $c = 1 / $kolom['jumlah_kriteria'];
                            $bobotObj->insert2($c, $baris['id_kriteria11'], $kolom['id_kriteria11']);
                            echo number_format($c, 4, '.', ',');
                        } else {
                            $bobotObj->readAll1($baris['id_kriteria11'], $kolom['id_kriteria11']);
                            $c = $bobotObj->kp / $kolom['jumlah_kriteria'];
                            $bobotObj->insert2($c, $baris['id_kriteria11'], $kolom['id_kriteria11']);
                            echo number_format($c, 4, '.', ',');
                        }
                        ?>
                    </td>
                <?php endwhile; ?>
                <th class="info">
                    <?php
                    $bobotObj->readSum2($baris['id_kriteria11']);
                    $j = $bobotObj->hak;
                    echo number_format($j, 4, '.', ',');
                    ?>
                </th>
                <th class="success">
                    <?php
                    $bobotObj->readAvg($baris['id_kriteria11']);
                    $b = $bobotObj->hak;
                    $bobotObj->insert4($b, $baris['id_kriteria11']);
                    $bobotObj->insert5($b, $baris['id_kriteria11']);
                    echo number_format($b, 4, '.', ',');
                    ?>
                </th>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<p>Perkalian Matriks</p>
<table width="100%" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Perkalian</th>
            <?php $bobots1y = $bobotObj->readAll2();
            while ($row = $bobots1y->fetch(PDO::FETCH_ASSOC)) : ?>
                <th><?= $row['nama_kriteria'] ?></th>
            <?php endwhile; ?>
            <th class="info">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php $sumRow = [];
        $bobots2y = $bobotObj->readAll2();
        while ($baris = $bobots2y->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <th class="active"><?= $baris['nama_kriteria'] ?></th>
                <?php $jumlah = 0;
                $bobots3y = $bobotObj->readAll2();
                while ($kolom = $bobots3y->fetch(PDO::FETCH_ASSOC)) : ?>
                    <td>
                        <?php
                        if ($baris['id_kriteria11'] == $kolom['id_kriteria11']) {
                            $c = $kolom['bobot_kriteria'] * 1;
                            echo number_format($c, 4, '.', ',');
                            $jumlah += $c;
                        } else {
                            $bobotObj->readAll1($baris['id_kriteria11'], $kolom['id_kriteria11']);
                            $c = $kolom['bobot_kriteria'] * $bobotObj->kp;
                            echo number_format($c, 4, '.', ',');
                            $jumlah += $c;
                        }
                        ?>
                    </td>
                <?php endwhile; ?>
                <th class="info">
                    <?php
                    $sumRow[$baris['id_kriteria11']] = $jumlah;
                    echo number_format($jumlah, 4, '.', ',');
                    ?>
                </th>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<br>
<?php
echo '*dari tabel normalisasi diatas, kemudian diolah sampai akhirnya mendapatkan hasil dari perhitungan ini, yang dimana nilai prioritas ini nantinya akan dikalikan dengan nilai alternatif untuk menentukan rangking wisata<br>';

?>
<table width="100%" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Rasio Konsistensi</th>
            <th class="info">Jumlah</th>
            <th class="success">Prioritas</th>
            <th class="warning">Hasil</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0;
        $bobots1z = $bobotObj->readAll2();
        while ($row1 = $bobots1z->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <th class="active"><?= $row1["nama_kriteria"] ?></th>
                <th class="info"><?= number_format($sumRow[$row1["id_kriteria11"]], 4, '.', ',') ?></th>
                <th class="success"><?= number_format($row1["bobot_kriteria"], 4, '.', ','); ?></th>
                <?php $jumlah = $sumRow[$row1["id_kriteria11"]] / $row1["bobot_kriteria"]; ?>
                <th class="warning"><?= number_format($jumlah, 4, '.', ','); ?></th>
                <?php $total += $jumlah; ?>
            </tr>
        <?php endwhile; ?>
    </tbody>
    <tfoot>
        <tr class="danger">
            <th colspan="3">Rata-rata</th>
            <th><?php $rata = $total / $count;
                echo number_format($rata, 4, '.', ','); ?></th>
        </tr>
    </tfoot>
</table>

<table width="100%" class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>N (kriteria)</th>
            <td><?= $count ?></td>
        </tr>
        <tr>
            <th>Hasil Akhir (X maks)</th>
            <td><?= number_format($rata, 4, '.', ','); ?></td>
        </tr>
        <tr>
            <th>IR</th>
            <td><?php echo $ir = $bobotObj->getIr($count); ?></td>
        </tr>
        <tr>
            <th>CI</th>
            <td><?php $ci = ($rata - $count) / ($count - 1);
                echo number_format($ci, 4, '.', ','); ?></td>
        </tr>
        <tr>
            <th>CR</th>
            <td><?php $cr = $ci / $ir;
                echo number_format($cr, 4, '.', ','); ?></td>
        </tr>
        <tr>
            <th>Keputusan</th>
            <td><?php
                if ($cr <= 0.10) {
                    $ok = " <span class=\"bg-primary text-white\">[OKE/KONSISTEN]</span>";
                } else {
                    $ok = " <span class=\"bg-danger text-white\">[BERMASALAH/TIDAK KONSISTEN] Silahkan Isi ulang Nilai Kriteria sampai hasil disini KONSISTEN</span>";
                }
                echo  $ok;
                ?></td>
        </tr>
    </tbody>
</table>