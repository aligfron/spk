<?= $this->extend('layout/tamplateadmin2'); ?>
<?= $this->section('content'); ?>

<section class="home" id="home">

    <h2>Edit Profil <i class='bx bxs-pencil'></i></h2>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <form name="twisata" method="POST" action="/menuadmin/editprofil2/<?= session()->get('userid'); ?>">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="nama" class="form-control" required autocomplete="off" autofocus value="<?= $profil['nama_user']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="email" class="form-control" required autocomplete="off" value="<?= $profil['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><input type="text" name="password" class="form-control" required autocomplete="off" value="<?= $profil['password']; ?>" id="password" />

                            <input type="hidden" name="level" value="<?= session()->get('userlevelid'); ?>">
                        </td>
                    </tr>


                    <tr>
                        <td colspan="3"><input type="submit" name="dbarang" Value="Edit" class="btn btn-success"></td>
                    </tr>
                </table>
            </form>
</section>

<?= $this->endSection(); ?>