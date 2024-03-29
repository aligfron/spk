<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<div class="container1">
    <div class="form" align="center">
        <form method="post" action="/login/cekUser">

            <?= csrf_field(); ?>
            <center>
                <h2 id="h2">LOGIN</h2>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif ?>
                <?php
                if (session()->getFlashdata('errEmail')) {
                    $isInvalEmail = 'is-invalid';
                } else {
                    $isInvalEmail = '';
                }
                ?>
                <input type="text" name="email" class="<?= $isInvalEmail; ?>" placeholder="Ketikkan Email" autocomplete="off" />
                <?php
                if (session()->getFlashdata('errEmail')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">
                ' . session()->getFlashdata('errEmail') . '
                </div>';
                } else {
                    echo '<br><br>';
                }
                ?>
                <?php
                $isInvalidpass = (session()->getFlashdata('errPassword')) ? 'is-invalid' : '';
                ?>
                <input type="password" name="pass" class="<?= $isInvalidpass; ?>" placeholder="Ketikkan password" autocomplete="off" />
                <?php
                if (session()->getFlashdata('errPassword')) {
                    echo '<div id="validationServer03Feedback" class="invalid-feedback">
                ' . session()->getFlashdata('errPassword') . '
                </div>';
                } else {
                    echo '<br><br>';
                }
                ?>
                <input type="submit" name="login" value="LOGIN " /><br><br>
            </center>
        </form>
        <a>Belum punya akun? Ayo </a><a href="/Register/index">Daftar</a>
    </div>
    </form>
</div>
<?= $this->endSection(); ?>