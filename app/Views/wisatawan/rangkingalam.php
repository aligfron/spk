<?php
$db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
$id = session()->get('userid');
$jenis = 'Alam';
$hasil_wisatawan = \App\Controllers\api::hasil_wisatawan($id, $jenis);
if ($hasil_wisatawan) {
    $No = 1;
    foreach (\App\Controllers\api::nilai_alter_w1() as $z) {

        $w = \App\Controllers\api::perkalianbobot_w1();
        $alam1 = $z[1] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w2();
        $alam2 = $z[2] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w3();
        $alam3 = $z[3] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w4();
        $alam4 = $z[4] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w5();
        $alam5 = $z[5] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w6();
        $alam6 = $z[6] * $w[0];

        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $hasilalam = $alam1 + $alam2 + $alam3 + $alam4 + $alam5 + $alam6;
        $id_wisatawan = session()->get('userid');
        $id_wisata = $z['7'];
        $q = $db->prepare("UPDATE hasil_wisatawan set jumlah = '$hasilalam' where id_wisatawan = '$id_wisatawan' and id_wisata = '$id_wisata'");
        $q->execute();
    }
} else {
    $No = 1;
    foreach (\App\Controllers\api::nilai_alter_w1() as $z) {

        $w = \App\Controllers\api::perkalianbobot_w1();
        $alam1 = $z[1] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w2();
        $alam2 = $z[2] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w3();
        $alam3 = $z[3] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w4();
        $alam4 = $z[4] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w5();
        $alam5 = $z[5] * $w[0];
        $w = \App\Controllers\api::perkalianbobot_w6();
        $alam6 = $z[6] * $w[0];



        $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
        $hasilalam = $alam1 + $alam2 + $alam3 + $alam4 + $alam5 + $alam6;
        $id_wisatawan = session()->get('userid');
        $id_wisata = $z['7'];
        $q = $db->prepare("INSERT into hasil_wisatawan value ('','$id_wisatawan','$id_wisata','$jenis','$hasilalam')");
        $q->execute();
    }
} ?>

<?php
echo '<hr><h5><span class="fas fa-sliders-h"></span> Berikut Merupakan Rangking Wisata Alam</h5>';
?>
<br>
<div class="accordion">
    <div class="accordion-item">
        <h2 class="accordion-header">

            <button class="accordion-button " type="button" data-bs-target="#1" aria-expanded="false" aria-controls="collapseTwo" disabled>
                Rangking&emsp;&emsp;&emsp;Nama Wisata
            </button>
        </h2>

    </div>
</div>
<?php $No = 1;
foreach (\App\Controllers\api::rank_alter_w1() as $rank1) {
    $id_wisata = $rank1['2'];
?>

    <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">

                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#121213" aria-expanded="false" aria-controls="collapseTwo">
                    &emsp;&emsp;<td><?= $rank1['2'] ?></td>&emsp;&emsp;&emsp;&emsp;&emsp;<td><?= $rank1['0'] ?></td>
                    &emsp;
                </button>
            </h2>
            <div id="121213" class="accordion-collapse collapse" data-bs-parent="#accordionExample121213">
                <div class="accordion-body">

                    <?php
                    foreach (\App\Controllers\api::wisata($id_wisata) as $q) { ?>
                        <strong><?= $q['1']; ?></strong> Terletak di <?= $q['2']; ?> dengan jarak sekitar <code><?= $q['3']; ?> KM</code> dari pusat kota. Tempat Wisata ini Memiliki fasilitas antara lain : <?= $q['5']; ?> adapun harga tiket masuk wisata ialah <?= $q['8']; ?> rupiah. serta dapat diakses oleh <?= $q['4']; ?>
                        <br><a href="/menuwisatawan/detail/<?= $q['id_wisata']; ?>" class="btn btn-sm btn-primary">Detail</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>