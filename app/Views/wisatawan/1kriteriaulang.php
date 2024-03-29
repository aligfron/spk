<?php

$id = session()->get('userid');


$db = new PDO('mysql:host=localhost;dbname=spkwisataskripsi', 'root', '');
$kriteriawisatawan = \App\Controllers\api::kriteriawisatawan($id);
if ($kriteriawisatawan) {
    $kriteria = \App\Controllers\api::data_kriteria();
    echo '<h5><span class="fas fa-sliders-h"></span> Perbandingan Kriteria</h5><hr>';
    echo '<form id="form-perbandingan-matrix" method="post"   class="mx-auto" autocomplete="off"><div class="custom-control custom-radio">';
    echo '*Pada Halaman ini merupakan halaman perbandingan berpasangan kriteria, yang dimana Nilai perbandingan ini digunakan untuk 
    membuat matriks perbandingan berpasangan. Matriks perbandingan berpasangan digunakan dalam metode AHP untuk menetapkan 
    prioritas setiap elemen. Nantinya nilai perbandingan kriteria ini menjadi acuan untuk menentukan rangking wisata. Adapun ketentuan dalam penilaian perbandingan kriteria dapat dilihat dibawah ini.<br><br>';
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

    <table class="table table-sm table-striped table-primary">
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
                $b = \App\Controllers\api::bobot_kriteria_wisatawan($kriteria[$x][0], $kriteria[$y][0]);
                if ($b) $b = $b['bobot'];
        ?>
                <tr>
                    <td><?= $kriteria[$x][1] ?></td>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '9/1') echo 'checked' ?> value="9/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '8/1') echo 'checked' ?> value="8/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '7/1') echo 'checked' ?> value="7/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '6/1') echo 'checked' ?> value="6/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '5/1') echo 'checked' ?> value="5/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '4/1') echo 'checked' ?> value="4/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '3/1') echo 'checked' ?> value="3/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '2/1') echo 'checked' ?> value="2/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/1') echo 'checked' ?> value="1/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/2') echo 'checked' ?> value="1/2" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/3') echo 'checked' ?> value="1/3" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/4') echo 'checked' ?> value="1/4" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/5') echo 'checked' ?> value="1/5" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/6') echo 'checked' ?> value="1/6" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/7') echo 'checked' ?> value="1/7" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/8') echo 'checked' ?> value="1/8" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/9') echo 'checked' ?> value="1/9" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <td><?= $kriteria[$y][1] ?></td>
                </tr>
        <?php
                //echo "<input value=\"$b\" name=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" id=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" class=\"form-control\">";
            }
        }
        ?>
    </table><?php
            echo '<br><div id="pesan-error"></div><button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Simpan dan Periksa</button></div></form>'; ?><br>

    <?php
    if (!empty($_POST)) {
        echo $this->include('wisatawan/1bobotkriwisatawan');
    }
} else {
    echo '<h5><span class="fas fa-sliders-h"></span> Perbandingan Kriteria</h5><hr>';
    echo '<form id="form-perbandingan-matrix" method="post"  class="mx-auto" autocomplete="off"><div class="custom-control custom-radio">';
    ?>
    <table class="table table-sm table-striped table-primary">
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
        <?php

        $kriteria = \App\Controllers\api::data_kriteria();
        for ($x = 0; $x < count($kriteria); $x++) {
            for ($y = $x + 1; $y < count($kriteria); $y++) {
                $b = \App\Controllers\api::bobot_kriteria($kriteria[$x][0], $kriteria[$y][0]);
                if ($b) $b = $b['bobot'];
        ?>
                <tr>
                    <td><?= $kriteria[$x][1] ?></td>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '9/1') echo 'checked' ?> value="9/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '8/1') echo 'checked' ?> value="8/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '7/1') echo 'checked' ?> value="7/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '6/1') echo 'checked' ?> value="6/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '5/1') echo 'checked' ?> value="5/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '4/1') echo 'checked' ?> value="4/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '3/1') echo 'checked' ?> value="3/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '2/1') echo 'checked' ?> value="2/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/1') echo 'checked' ?> value="1/1" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/2') echo 'checked' ?> value="1/2" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/3') echo 'checked' ?> value="1/3" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/4') echo 'checked' ?> value="1/4" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/5') echo 'checked' ?> value="1/5" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/6') echo 'checked' ?> value="1/6" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/7') echo 'checked' ?> value="1/7" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/8') echo 'checked' ?> value="1/8" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <th class="text-center"><label class="radio"><input class="form-check-input" <?php if ($b == '1/9') echo 'checked' ?> value="1/9" type="radio" name="<?= $kriteria[$x][0] . '-' . $kriteria[$y][0] ?>"><span></span></label></th>
                    <td><?= $kriteria[$y][1] ?></td>
                </tr>
        <?php
                //echo "<input value=\"$b\" name=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" id=\"{$kriteria[$x][0]}-{$kriteria[$y][0]}\" class=\"form-control\">";
            }
        }
        ?>
    </table><?php
            echo '<br><div id="pesan-error"></div><button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Simpan dan Periksa</button></div></form>'; ?><br>

<?php
}
?>