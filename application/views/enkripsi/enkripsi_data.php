<section class="content-header">
    <div>
        <h1 style="padding-left: 10px;"><i class="fa fa-lock" style="padding-right: 5px;"></i> Enkripsi </h1>
    </div>


</section>

<!---konten--->
<section class="content">

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Enkripsi Dokumen</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <?php echo validation_errors();
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="inputPassword">Tanggal</label>
                            <input type="text" name="datenow" class="form-control" type="text" value="<?= date("Y-m-d"); ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="inputFile">Dokumen</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea type="textArea" rows="3" name="desc" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="encrypt_file" class="btn btn-primary""><i class=" fa fa-lock"></i> Enkripsi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>