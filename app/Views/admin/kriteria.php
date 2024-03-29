<?php
$db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
if (!empty($_POST)) {
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] >= 1) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $q = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='{$_POST[$x]}' WHERE id_kriteria1='$k1' and id_kriteria2='$k2'");
            $q->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] >= 1) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 1 / $_POST[$x];
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] < 1) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $q = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='{$_POST[$x]}' WHERE id_kriteria1='$k1' and id_kriteria2='$k2'");
            $q->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.5) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 2;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.333333) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 3;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.25) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 4;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.2) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 5;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.1666666) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 6;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.14285) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 7;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.125) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 8;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        if ($_POST[$x] == 0.1111111) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $a = 9;
            $bq = $db->prepare("UPDATE ahp_analisa_kriteria SET nilai_analisa_kriteria='$a' WHERE id_kriteria1='$k2' and id_kriteria2='$k1'");
            $bq->execute();
        }
    }
    foreach (array_keys($_POST) as $x) {
        $k1 = explode('-', $x)[0];
        $k2 = explode('-', $x)[1];
        $q = $db->prepare("UPDATE perbandingan_kriteria SET bobot='{$_POST[$x]}' WHERE id_kriteria1='$k1' and id_kriteria2='$k2'");
        $q->execute();
    }
}
?>
<?= $this->extend('layout/tamplateadmin2'); ?>
<?= $this->section('content'); ?>



<section class="home" id="home">

    <h2>Kriteria</h2>
    <hr>
    <div class="row">
        <!-- accordion -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Data Kriteria
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">


                        Pada sistem ini terdapat 6 kriteria yang telah ditentukan, 6 kriteria itu ialah :

                        <table class="table table-striped table-bordered table-sm">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Atribut</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($data_kriteria as $x) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $x['nama_kriteria'] ?></td>
                                    <td class="text-center"><?= $x['atribut'] ?></td>

                                </tr>

                            <?php endforeach; ?>
                        </table>
                        <div class="alert alert-warning" role="alert">
                            data kriteria diatas memiliki atribut banefit yang artinya semakin besar nilai yang didapat maka sifatnya semakin baik.
                            dari data kriteria diatas, nantinya akan diolah menggunakan metode AHP, dimana step pertamanya ialah membandingkan satu persatu dari setiap kriteria dan diberi skala penilaian dari 1-9. adapun lebih lengkapnya bisa dilihat di menu <strong>Perbandingan kriteria</strong> dibawah ini
                        </div>

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Data Perbandingan Kriteria
                    </button>
                </h2>
                <div id="#kriteria">
                    <div id="collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">



                            <?php
                            $kriteria = \App\Controllers\api::data_kriteria();
                            echo '<h5><span class="fas fa-sliders-h"></span> Perbandingan Kriteria</h5><hr>';
                            echo '*Pada Halaman ini merupakan halaman perbandingan berpasangan kriteria, yang dimana Nilai perbandingan ini digunakan untuk 
                            membuat matriks perbandingan berpasangan. Matriks perbandingan berpasangan digunakan dalam metode AHP untuk menetapkan 
                            prioritas setiap elemen. Adapun ketentuan dalam penilaian perbandingan kriteria dapat dilihat dibawah ini.<br><br>';
                            echo '<form id="form-perbandingan-matrix" method="post"  class="mx-auto" autocomplete="off"><div class="custom-control custom-radio">';
                            ?>
                            <div class="toast  fade show">
                                <div class="toast-header ">
                                    <strong class="me-auto"><i class="bi-gift-fill"></i> ketentuan penilaian perbandingan kriteria</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                </div>
                                <div class="toast-body">
                                    <table class=" table-sm table-bordered border-dark">
                                        <tr class="text-center">
                                            <td>Nilai</td>
                                            <td>Definisi</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Sama pentingnya dibanding yang lain</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>Sedikit lebih penting dibanding yang lain</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>Cukup penting dibanding dengan yang lain</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td>Sangat penting dibanding dengan yang lain</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td>Ekstrim pentingnya dibanding yang lain</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2, 4, 6, 8</td>
                                            <td>Nilai diantara dua penilaian yang berdekatan</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <table class="table table-sm table-striped table-success">
                                <tr class="text-center">
                                    <th>kriteria</th>
                                    <th>9</th>
                                    <th>8</th>
                                    <th>7</th>
                                    <th>6</th>
                                    <th>5</th>
                                    <th>4</th>
                                    <th>3</th>
                                    <th>2</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>
                                    <th>9</th>
                                    <th>kriteria</th>
                                </tr>
                                <?php for ($x = 0; $x < count($kriteria); $x++) {
                                    for ($y = $x + 1; $y < count($kriteria); $y++) {
                                        $b = \App\Controllers\api::bobot_kriteria($kriteria[$x][0], $kriteria[$y][0]);
                                        if ($b) $b = $b['bobot'];
                                ?>
                                        <tr>
                                            <td><?= $kriteria[$x][1] ?></td>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '9') echo 'checked' ?> value="9" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '8') echo 'checked' ?> value="8" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '7') echo 'checked' ?> value="7" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '6') echo 'checked' ?> value="6" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '5') echo 'checked' ?> value="5" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '4') echo 'checked' ?> value="4" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '3') echo 'checked' ?> value="3" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '2') echo 'checked' ?> value="2" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1') echo 'checked' ?> value="1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.5') echo 'checked' ?> value="0.5" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.333333') echo 'checked' ?> value="0.333333" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.25') echo 'checked' ?> value="0.25" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.2') echo 'checked' ?> value="0.2" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.1666666') echo 'checked' ?> value="0.1666666" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.14285') echo 'checked' ?> value="0.14285" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.125') echo 'checked' ?> value="0.125" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.1111111') echo 'checked' ?> value="0.1111111" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                            <td><?= $kriteria[$y][1] ?></td>
                                        </tr>
                                <?php
                                        //echo "<input value=\"$b\" name=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" id=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" class=\"form-control\">";
                                    }
                                }
                                ?>
                            </table>


                            <?php
                            echo '<br><div id="pesan-error"></div><button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Simpan dan Periksa</button></div></form>'; ?><br>

                            <?php
                            if (!empty($_POST)) {
                                echo $this->include('admin/bobotkri');
                            }
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</section>

<?= $this->endSection(); ?>