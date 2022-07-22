<section class="content-header">
    <div>
        <h1 style="padding-left: 10px;"><i class="fa fa-copy" style="padding-right: 5px;"></i> Deskripsi </h1>
    </div>

</section>

<!---konten--->
<section class="content">

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Daftar Dokumen Arsip</h5>

        </div>

        <div class="card-body table-responsive">
            <h3 align="center">Deskripsi Dokumen</h3>
            <br>
            <form class="form-horizontal" action="<?= base_url('deskripsi/decrypt_file') ?>" method="post">
                <table class="table striped">
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) {
                    ?>
                        <tr>
                            <td>Nama Sumber Dokumen</td>
                            <td>:</td>
                            <td><?= ucfirst($data->file_name_source) ?></td>
                        </tr>
                        <tr>
                            <td>Nama Dokumen Enkripsi</td>
                            <td>:</td>
                            <td><?= ucfirst($data->file_name_finish) ?></td>
                        </tr>
                        <tr>
                            <td>Ukuran File</td>
                            <td>:</td>
                            <td><?= ucfirst($data->file_size) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Enkripsi</td>
                            <td>:</td>
                            <td><?= ucfirst($data->tgl_upload) ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td><?= ucfirst($data->keterangan) ?></td>
                        </tr>
                        <tr>
                            <td>Masukan Password Untuk Mendeskripsi</td>
                            <td></td>
                            <td>
                                <div class="col-md-6">
                                    <input type="hidden" name="fileid" value="<?= $data->file_id; ?>">
                                    <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required><br>
                                    <input type="submit" name="decrypt_now" value="Dekripsi Dokumen" class="form-control btn btn-primary">
                                </div>
                            </td>
                        <?php
                    }
                        ?>
                        </tr>
                </table>
            </form>
        </div>
    </div>
</section>