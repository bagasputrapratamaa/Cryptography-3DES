<section class="content-header">
    <div>
        <h1 style="padding-left: 10px;"><i class="fa fa-user" style="padding-right: 5px;"></i> User Pengguna </h1>
    </div>
    <hr>
    <h6>
        Note Level :
    </h6>
    <h6>
        1 = Admin
    </h6>
    <h6>
        2 = Manajer
    </h6>
    <h6>
        3 = Pimpinan
    </h6>
    <h6>
        4 = Karyawan
    </h6>


</section>

<!---konten--->
<section class="content">

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Data Pengguna</h5>
            <div class="" style="float: right;">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary ">
                    <i class="fa fa-user-plus"></i> Tambah Data Pengguna
                </a>
            </div>
        </div>

        <div class="card-body table-responsive">
            <table class="table  table-bordered table-striped text-center" id="table1">
                <thead style="background-color: #343a40;">
                    <tr>
                        <th style="color: white;">No</th>
                        <th style="color: white;">Username</th>
                        <th style="color: white;">Fullname</th>
                        <th style="color: white;">Job Title</th>
                        <th style="color: white;">Level</th>
                        <th style="color: white;">Edit</th>
                        <th style="color: white;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) {
                    ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= ucfirst($data->username) ?></td>
                            <td><?= ucfirst($data->fullname) ?></td>
                            <td><?= ucfirst($data->job_title) ?></td>
                            <td><?= ucfirst($data->level) ?></td>
                            <td>
                                <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                            <td>
                                <form action="<?= site_url('user/del') ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button onclick="return confirm('Yakin ingin data dihapus?')" href="<?= site_url('user/edit/') ?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>