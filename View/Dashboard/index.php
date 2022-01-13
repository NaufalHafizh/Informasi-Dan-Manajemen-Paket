<?php
include "../../function/connect.php";
login();
$menghitung_huruf = strlen($_SESSION['username']);
$nama_depan = substr($_SESSION['username'], 0, 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Admin</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../../plugin/bootstrap-5.1.1-dist/css/bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../../css/adminlte.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../../../plugin/fontawesome-free-5.15.4-web/css/all.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link d-flex" href="#" data-bs-toggle="modal" data-bs-target="#logout">
                        <p>LOGOUT</p>
                        <i class="nav-icon fas fa-power-off mt-1 ml-1"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="../../../img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <span class="text-uppercase fw-bold text-dark btn btn-light rounded-circle"><?= $nama_depan; ?></span>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['username']; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=admin_dashboard">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        User
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php?page=admin_user" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>admin</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?page=admin_user2" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Courier</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?page=admin_user_reg" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>
                                    Pengiriman
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=admin_pengiriman" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Semua Pengiriman</p>
                                    </a>
                                </li>
                                <?php if (isset($_SESSION['admin'])) : ?>
                                    <li class="nav-item">
                                        <a href="index.php?page=kategori" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ketegori</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?page=ongkir" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ongkir</p>
                                        </a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

                            include "../../function/routing.php";
                            ?>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda Yakin Ingin Keluar ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">NO</button>
                    <a class="text-decoration-none btn btn-danger" href="../../function/logout.php">YES</a>
                </div>
            </div>
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../plugin/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugin/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });
        });
    </script>
</body>

</html>