<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container1">

    <div class="form" align="center">
        <form name="login" method="POST" action="/register/save">
            <center>
                <h2 id="h2">DAFTAR</h2>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <?php
                if (session()->getFlashdata('errEmail')) {
                    $isInvalEmail = 'is-invalid';
                } else {
                    $isInvalEmail = '';
                }
                ?>

                <input type="text" name="email" class="<?= $isInvalEmail; ?>" placeholder="Ketikkan Email" autocomplete="off" required />
                <?php
                if (session()->getFlashdata('errEmail')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">
                ' . session()->getFlashdata('errEmail') . '
                </div>';
                } else {
                    echo '<br><br>';
                }
                ?>
                <input type="text" name="nama" placeholder="Ketikkan Nama Lengkap" autocomplete="off" required /><br><br>
                <?php
                $isInvalPass = (session()->getFlashdata('errPassword')) ? 'is-invalid' : '';
                ?>
                <input type="password" name="password" class="<?= $isInvalPass; ?>" placeholder="Ketikkan password" autocomplete="off" required />
                <?php
                if (session()->getFlashdata('errPassword')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">
                    ' . session()->getFlashdata('errPassword') . '
                </div>';
                } else {
                    echo '<br><br>';
                }


                ?>

                <input type="submit" name="daftar" value="DAFTAR"><br><br>
                <a> Sudah Punya Akun?Ayo </a><a href="/Login/index">Login</a>
    </div>

</div>
<?= $this->endSection(); ?>