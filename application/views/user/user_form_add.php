<section class="content-header">
    <h1> User Pengguna</h1>
    <hr>


</section>

<!---konten--->
<section class="content">

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Tambah Data Pengguna</h5>
            <div class="" style="float: right;">
                <a href="<?= site_url('user') ?>" class="btn btn-primary ">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?php echo validation_errors();
                    ?>
                    <form action="" method="post">
                        <div class="form-group ">
                            <label>Username</label>
                            <input type="text" value="<?= set_value('username') ?>" name="username" class="form-control">

                        </div>
                        <div class="form-group ">
                            <label>Fullname</label>
                            <input type="text" value="<?= set_value('fullname') ?>" name="fullname" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Confrim Password</label>
                            <input type="password" value="<?= set_value('passconf') ?>" name="passconf" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" value="<?= set_value('jobtitle') ?>" name="jobtitle" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select type="text" name="level" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Manajer</option>
                                <option value="3" <?= set_value('level') == 3 ? "selected" : null ?>>Pimpinan</option>
                                <option value="4"> <?= set_value('level') == 4 ? "selected" : null ?>Karyawan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-warning">Kosongkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>