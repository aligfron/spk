<?= $this->extend('layout/tamplateadmin2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">

    <h2>Rangking Alternatif</h2>
    <hr>
    <table class="table table-bordered w-auto table-sm">
        <thead>
            <tr class="table-success">
                <td colspan="3" align="center">Wisata Alam</td>
            </tr>
            <tr class="info">
                <td vertical-align="middle">Nama Alternatif</td>
                <td vertical-align="middle">Jumlah Perhitungan</td>
                <td vertical-align="middle">Rangking</td>

            </tr>
        </thead>

        <tbody>
            <?php $No = 1;
            foreach (\App\Controllers\api::rank_alter1() as $rank1) { ?>
                <tr>
                    <td><?= $rank1['0'] ?></td>
                    <td align="center"><?= $rank1['1'] ?></td>
                    <td align="center"><?= $rank1['2'] ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table><br>
    <table class="table table-bordered w-auto table-sm">
        <thead>
            <tr class="table-success">
                <td colspan="3" align="center">Wisata Budaya</td>
            </tr>
            <tr class="info">
                <td vertical-align="middle">Nama Alternatif</td>
                <td vertical-align="middle">Jumlah Perhitungan</td>
                <td vertical-align="middle">Rangking</td>

            </tr>
        </thead>

        <tbody>
            <?php $No = 1;
            foreach (\App\Controllers\api::rank_alter2() as $rank2) { ?>
                <tr>
                    <td><?= $rank2['0'] ?></td>
                    <td align="center"><?= $rank2['1'] ?></td>
                    <td align="center"><?= $rank2['2'] ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table><br>
    <table class="table table-bordered w-auto table-sm">
        <thead>
            <tr class="table-success">
                <td colspan="3" align="center">Wisata Buatan</td>
            </tr>
            <tr class="info">
                <td vertical-align="middle">Nama Alternatif</td>
                <td vertical-align="middle">Jumlah Perhitungan</td>
                <td vertical-align="middle">Rangking</td>

            </tr>
        </thead>

        <tbody>
            <?php $No = 1;
            foreach (\App\Controllers\api::rank_alter3() as $rank3) { ?>
                <tr>
                    <td><?= $rank3['0'] ?></td>
                    <td align="center"><?= $rank3['1'] ?></td>
                    <td align="center"><?= $rank3['2'] ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table><br>
    <table class="table table-bordered w-auto table-sm">
        <thead>
            <tr class="table-success">
                <td colspan="3" align="center">Wisata Kuliner</td>
            </tr>
            <tr class="info">
                <td vertical-align="middle">Nama Alternatif</td>
                <td vertical-align="middle">Jumlah Perhitungan</td>
                <td vertical-align="middle">Rangking</td>

            </tr>
        </thead>

        <tbody>
            <?php $No = 1;
            foreach (\App\Controllers\api::rank_alter4() as $rank4) { ?>
                <tr>
                    <td><?= $rank4['0'] ?></td>
                    <td align="center"><?= $rank4['1'] ?></td>
                    <td align="center"><?= $rank4['2'] ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</section>
<?= $this->endSection(); ?>