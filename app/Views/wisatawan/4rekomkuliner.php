<?php

$db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
$id = session()->get('userid');
if (!empty($_POST)) {
    $kriteriawisatawan = \App\Controllers\api::kriteriawisatawan($id);
    if ($kriteriawisatawan) {
        foreach (array_keys($_POST) as $x) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];

            $abc = $db->prepare("UPDATE perbandingan_kriteria_wisatawan SET bobot='{$_POST[$x]}' WHERE id_kriteria1='$k1' and id_kriteria2='$k2' and id_wisatawan='$id'");
            $abc->execute();
        }
    } else {
        foreach (array_keys($_POST) as $x) {
            $k1 = explode('-', $x)[0];
            $k2 = explode('-', $x)[1];
            $abc = $db->prepare("INSERT INTO perbandingan_kriteria_wisatawan VALUE ('','$id','$k1', '$k2', '{$_POST[$x]}')");
            $abc->execute();
        }
        for ($x = 1; $x <= 6; $x++) {
            $abcd = $db->prepare("INSERT INTO bobot_kriteria_wisatawan VALUE ('$x++','$id','')");
            $abcd->execute();
        }
    }
}
?>
<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>
<section class="home" id="home">

    <section class="bg-light py-3 py-md-5 py-xl-8">
        <div class="row">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="mb-4 display-5 text-center">Rangking Wisata Kuliner</h2>
                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                    </div>
                </div>
            </div>

            <?php
            foreach (\App\Controllers\api::rank_alter4() as $rank3) {
                $db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
                $id_wisata =  $rank3['3'];
                foreach (\App\Controllers\api::wisata($id_wisata) as $k) {
            ?>
                    <div class="col-sm-4 ">
                        <?php echo '<br>'; ?>
                        <div class="card " style="width: 18rem;">
                            <img src="/img/<?= $k['gambar']; ?>" class="card-img-top" alt="" style="height: 10rem;" width="100%">
                            <div class="card-body">
                                <code>#Rangking ke <?= $rank3['2']; ?></code>
                                <p><strong><?= $k['1']; ?></strong> Terletak di <?= $k['2']; ?> dengan jarak sekitar <code><?= $k['3']; ?> KM</code> dari pusat kota. adapun harga tiket masuk wi......</p>
                                <a href="/menuwisatawan/detail/<?= $k['id_wisata']; ?>" class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </section>

    <div class="row">
        <!-- accordion -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <br>
                        <div class="alert alert-warning" role="alert">
                            *dibawah ini merupakan data perbandingan kriteria yang digunakan sebagai acuan dalam proses perangkingan wisata diatas.
                        </div>
                        <br>
                        <?php
                        $kriteria = \App\Controllers\api::data_kriteria();
                        echo '<h5><span class="fas fa-sliders-h"></span> Perbandingan Kriteria</h5><hr>';
                        echo '*dibawah ini merupakan halaman perbandingan berpasangan kriteria,  dimana Nilai perbandingan ini digunakan untuk 
                            membuat matriks perbandingan berpasangan. Matriks perbandingan berpasangan digunakan dalam metode AHP untuk menetapkan 
                            prioritas setiap elemen. Nantinya nilai perbandingan kriteria ini menjadi acuan untuk menentukan rangking wisata.<br><br>';

                        ?><table class="table table-sm table-striped table-dark">
                            <tr class="text-center">
                                <th>kriteria 1</th>
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
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '9') echo 'checked' ?> value="9/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '8') echo 'checked' ?> value="8/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '7') echo 'checked' ?> value="7/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '6') echo 'checked' ?> value="6/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '5') echo 'checked' ?> value="5/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '4') echo 'checked' ?> value="4/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '3') echo 'checked' ?> value="3/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '2') echo 'checked' ?> value="2/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1') echo 'checked' ?> value="1/1" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.5') echo 'checked' ?> value="1/2" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.333333') echo 'checked' ?> value="1/3" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.25') echo 'checked' ?> value="1/4" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.2') echo 'checked' ?> value="1/5" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.1666666') echo 'checked' ?> value="1/6" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.14285') echo 'checked' ?> value="1/7" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.125') echo 'checked' ?> value="1/8" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '0.1111111') echo 'checked' ?> value="1/9" type="radio" disabled name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                                        <td><?= $kriteria[$y][1] ?></td>
                                    </tr>
                            <?php
                                    //echo "<input value=\"$b\" name=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" id=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" class=\"form-control\">";
                                }
                            }
                            ?>
                        </table><br>
                        <div class="alert alert-warning" role="alert">*Apabila Anda Kurang Setuju dengan Nilai perbandingan pada setiap Kriteria diatas, anda dapat mengisi ulang nilai perbandingan kriteria di Menu dibawah ini, dan anda dapat melihat hasil rangking wisata sesuai nilai perbandinga kriteria yang telah anda buat :</div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Atur Ulang Nilai Perbandingan Kriteria
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?= $this->include('wisatawan/4kriteriaulang'); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?= $this->endSection(); ?>