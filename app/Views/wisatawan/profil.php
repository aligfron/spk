<?= $this->extend('layout/tamplatewisatawan2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">

    <h2>Profil <i class='bx bxs-user-check'></i></h2>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <form name="twisata" method="POST" action="/menuwisatawan/editprofil">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="nama" class="form-control" required autocomplete="off" value="<?= $profil['nama_user']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="email" class="form-control" required autocomplete="off" value="<?= $profil['email']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="password" name="password" class="form-control" required autocomplete="off" value="<?= $profil['password']; ?>" readonly></td>
                    </tr>


                    <tr>
                        <td colspan="3"><input type="submit" name="dbarang" Value="Edit" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>
</section>

<?= $this->endSection(); ?>