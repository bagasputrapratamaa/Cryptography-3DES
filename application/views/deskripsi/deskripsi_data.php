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
            <table class="table  table-bordered table-striped text-center" id="table1">
                <thead style="background-color: #343a40;">
                    <tr>
                        <th style="color: white;">No</th>
                        <th style="color: white;">Nama Sumber Dokumen</th>
                        <th style="color: white;">Nama Dokumen Enkripsi</th>
                        <th style="color: white;">Path Dokumen</th>
                        <th style="color: white;">Status</th>
                        <th style="color: white;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) {
                    ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= ucfirst($data->file_name_source) ?></td>
                            <td><?= ucfirst($data->file_name_finish) ?></td>
                            <td><?= ucfirst($data->file_url) ?></td>
                            <td><?php if ($data->status == 1) {
                                    echo "TERENKRIPSI";
                                } elseif ($data->status == 2) {
                                    echo "TERDESKRIPSI";
                                } else {
                                    echo "Status Tidak Diketahui";
                                }
                                ?></td>
                            <td><a href="<?= site_url('deskripsi/show/' . $data->file_id) ?>" class="btn btn-success">DESKRIPSI</a></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </>
        </div>
    </div>
</section>