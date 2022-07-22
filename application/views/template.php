<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= ucfirst($this->fungsi->user_login()->job_title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <div style="padding-top: 5px; padding-left: 10px;" class="row">

                    <h5>Selamat Datang <?= ucfirst($this->fungsi->user_login()->fullname) ?>! Sebagai <strong><?= ucfirst($this->fungsi->user_login()->job_title) ?></strong></h5>

                </div>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg ">
                        <li>
                            <a href="<?= site_url('auth/logout') ?>" class="dropdown-item">
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('dashboard') ?>" class="brand-link">
                <span style="padding-left: 22px;" class="brand-text font-weight-light">Herysapta Consultant</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block"><?= ucfirst($this->fungsi->user_login()->fullname) ?></a>

                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= site_url('dashboard') ?>" class="nav-link">
                                <i class="nav-icon fa fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <li class="nav-header">Admin Panel</li>
                            <li class="nav-item">
                                <a href="<?= site_url('user') ?>" class="nav-link">
                                    <i class="nav-icon fa fa-users"></i>
                                    <p>
                                        Tambah Data
                                    </p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-header">Main Menu</li>
                        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) { ?>
                            <li class="nav-item">
                                <a href="<?= site_url('enkripsi') ?>" class="nav-link">
                                    <i class="nav-icon fa fa-lock"></i>
                                    <p>Enkripsi Dokumen</p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
                                <a href="<?= site_url('deskripsi') ?>" class="nav-link">
                                    <i class="nav-icon fa fa-copy"></i>
                                    <p>Deskripsi Dokumen</p>
                                </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a href="<?= site_url('daftar') ?>" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>Daftar Dokumen File</p>
                        </a>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents; ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Created &copy; by <a href="">Bagas</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>

</body>

</html>