<section class="content-header">
    <h1> User Pengguna</h1>
    <hr>


</section>

<!---konten--->
<section class="content">

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Edit Data Pengguna</h5>
            <div class="" style="float: right;">
                <a href="<?= site_url('user') ?>" class="btn btn-primary ">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group ">
                            <label>Username</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                            <input type="text" value="<?= $this->input->post('username') ? $this->input->post('username') : $row->username ?>" name="username" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group ">
                            <label>Fullname</label>
                            <input type="text" value="<?= $this->input->post('fullname') ? $this->input->post('fullname') : $row->fullname ?>" name="fullname" class="form-control">
                            <?= form_error('fullname') ?>
                        </div>
                        <div class="form-group">
                            <label>New Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                            <input type="password" value="<?= $this->input->post('password') ?>" name="password" class="form-control">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group">
                            <label>Confrim New Password</label>
                            <input type="password" value="<?= $this->input->post('passconf') ?>" name="passconf" class="form-control">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" value="<?= $this->input->post('jobtitle') ? $this->input->post('jobtitle') : $row->job_title ?>" name="jobtitle" class="form-control">
                            <?= form_error('jobtitle') ?>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select type="text" name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1" <?= $level == 1 ? "selected" : '' ?>>Admin</option>
                                <option value="2" <?= $level == 2 ? "selected" : '' ?>>Manajer</option>
                                <option value="3" <?= $level == 3 ? "selected" : '' ?>>Pimpinan</option>
                                <option value="4" <?= $level == 4 ? "selected" : '' ?>>Karyawan</option>
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