<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../login-p.php?info=login");
}

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Masyarakat</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <div class="title">

                    <a href="beranda.php" class="navbar-brand">
                        <!-- <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                        <span class="brand-text font-weight-normal text-primary">Aplikasi Pengaduan Masyarakat</span>
                    </a>
                </div>


                <ul class="navbar-nav text-center" style="font-size:17px">
                    <li class="nav-item">
                        <a href="beranda.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_pengaduan.php" class="nav-link">Data Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_pengaduan.php" class="nav-link">Data Tanggapan</a>
                    </li>

                </ul>

                <div class="nav-item">
                    <a class="nav-link bg-danger font-weight-bold rounded" href="logout.php">
                    <i class="fas fa-sign-out-alt pr-1"></i>
                        LOGOUT
                    </a>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Aplikasi Pengaduan Masyarakat</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">

                        <!-- /.col-md-12 -->
                        <div class="col-lg-12">

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0" style="font-size:30px">Home</h5>

                                </div>

                                <div class="card-body">
                                    <div class="row">

                                        <?php
                                        include '../php/koneksi/koneksi.php';

                                        $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM pengaduan");
                                        // echo $cnt;

                                        $row = mysqli_fetch_array($cnt);

                                        $total = $row[0];
                                        // echo "Total rows: " . $total;
                                        ?>

                                        <div class=" col-md-4">

                                            <div class="small-box bg-info">
                                                <div class="inner pl-3">
                                                    <h3><?= $total ?></h3>

                                                    <p>Pengaduan Masuk</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-tasks"></i>
                                                </div>
                                                <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal-masuk">
                                                    Cek Pengaduan&ensp;<i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>

                                            <div class="modal fade" id="modal-masuk">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tabel Pengaduan Masuk</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <!-- <th style="width: 150px">Foto</th> -->
                                                                        <th style="width: 150px">Tanggal Pengaduan</th>
                                                                        <th>Isi Pengaduan</th>
                                                                        <th style="width: 150px">Status</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $no = 1;
                                                                    $query = "SELECT * FROM pengaduan";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                                    ?>

                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <!-- <td class="text-center"> -->
                                                                            <!-- <img data-enlargable src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br> -->
                                                                            <!-- <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                                                <i class="fas fa-search-plus"></i> Lihat Gambar 
                                                                            </a> -->

                                                                            <!-- </td> -->
                                                                            <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                                            <td><?= $row['isi_laporan'] ?></td>
                                                                            <td class="text-center ">
                                                                                <?php if ($row['status'] == '0') { ?>
                                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                                <?php } else if ($row['status'] == 'proses') { ?>
                                                                                    <span class="badge bg-primary">Proses</span>
                                                                                <?php } else if ($row['status'] == 'tolak') { ?>
                                                                                    <span class="badge bg-danger">Tolak</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge bg-success">Selesai</span>
                                                                                <?php } ?>
                                                                            </td>

                                                                        </tr>



                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class=" col-md-4">
                                            <?php
                                            include '../php/koneksi/koneksi.php';

                                            $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM pengaduan WHERE status='0'");
                                            // echo $cnt;

                                            $row = mysqli_fetch_array($cnt);

                                            $total = $row[0];
                                            // echo "Total rows: " . $total;
                                            ?>

                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3><?= $total ?></h3>

                                                    <p>Pengaduan Menunggu</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-clock"></i>
                                                </div>
                                                <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal-menunggu">
                                                    Cek Pengaduan&ensp;<i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>

                                            <div class="modal fade" id="modal-menunggu">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tabel Pengaduan Menunggu</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <!-- <th style="width: 150px">Foto</th> -->
                                                                        <th style="width: 150px">Tanggal Pengaduan</th>
                                                                        <th>Isi Pengaduan</th>
                                                                        <th style="width: 150px">Status</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $no = 1;
                                                                    $query = "SELECT * FROM pengaduan WHERE status='0'";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                                    ?>

                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <!-- <td class="text-center">
                                                                            <img data-enlargable src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br> -->
                                                                            <!-- <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                                                <i class="fas fa-search-plus"></i> Lihat Gambar 
                                                                            </a> -->

                                                                            <!-- </td> -->
                                                                            <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                                            <td><?= $row['isi_laporan'] ?></td>
                                                                            <td class="text-center ">
                                                                                <?php if ($row['status'] == '0') { ?>
                                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                                <?php } else if ($row['status'] == 'proses') { ?>
                                                                                    <span class="badge bg-primary">Proses</span>
                                                                                <?php } else if ($row['status'] == 'tolak') { ?>
                                                                                    <span class="badge bg-danger">Tolak</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge bg-success">Selesai</span>
                                                                                <?php } ?>
                                                                            </td>

                                                                        </tr>



                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class=" col-md-4">
                                            <?php
                                            include '../php/koneksi/koneksi.php';

                                            $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM pengaduan WHERE status='proses'");
                                            // echo $cnt;

                                            $row = mysqli_fetch_array($cnt);

                                            $total = $row[0];
                                            // echo "Total rows: " . $total;
                                            ?>

                                            <div class="small-box bg-primary">
                                                <div class="inner">
                                                    <h3><?= $total ?></h3>

                                                    <p>Pengaduan Di Proses</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-code-branch"></i>
                                                </div>
                                                <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal-proses">
                                                    Cek Pengaduan&ensp;<i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>

                                            <div class="modal fade" id="modal-proses">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tabel Pengaduan Proses</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <!-- <th style="width: 150px">Foto</th> -->
                                                                        <th style="width: 150px">Tanggal Pengaduan</th>
                                                                        <th>Isi Pengaduan</th>
                                                                        <th style="width: 150px">Status</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $no = 1;
                                                                    $query = "SELECT * FROM pengaduan WHERE status='proses'";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                                    ?>

                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <!-- <td class="text-center">
                                                                            <img data-enlargable src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br> -->
                                                                            <!-- <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                                                <i class="fas fa-search-plus"></i> Lihat Gambar 
                                                                            </a> -->

                                                                            <!-- </td> -->
                                                                            <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                                            <td><?= $row['isi_laporan'] ?></td>
                                                                            <td class="text-center ">
                                                                                <?php if ($row['status'] == '0') { ?>
                                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                                <?php } else if ($row['status'] == 'proses') { ?>
                                                                                    <span class="badge bg-primary">Proses</span>
                                                                                <?php } else if ($row['status'] == 'tolak') { ?>
                                                                                    <span class="badge bg-danger">Tolak</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge bg-success">Selesai</span>
                                                                                <?php } ?>
                                                                            </td>

                                                                        </tr>



                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <div class=" col-md-4">
                                            <?php
                                            include '../php/koneksi/koneksi.php';

                                            $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM pengaduan WHERE status='selesai'");
                                            // echo $cnt;

                                            $row = mysqli_fetch_array($cnt);

                                            $total = $row[0];
                                            // echo "Total rows: " . $total;
                                            ?>

                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3><?= $total ?></h3>

                                                    <p>Pengaduan Selesai</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                                <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal-selesai">
                                                    Cek Pengaduan&ensp;<i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>

                                            <div class="modal fade" id="modal-selesai">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tabel Pengaduan Selesai</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <!-- <th style="width: 150px">Foto</th> -->
                                                                        <th style="width: 150px">Tanggal Pengaduan</th>
                                                                        <th>Isi Pengaduan</th>
                                                                        <th style="width: 150px">Status</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $no = 1;
                                                                    $query = "SELECT * FROM pengaduan WHERE status='selesai'";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                                    ?>

                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <!-- <td class="text-center">
                                                                            <img data-enlargable src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br> -->
                                                                            <!-- <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                                                <i class="fas fa-search-plus"></i> Lihat Gambar 
                                                                            </a> -->

                                                                            <!-- </td> -->
                                                                            <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                                            <td><?= $row['isi_laporan'] ?></td>
                                                                            <td class="text-center ">
                                                                                <?php if ($row['status'] == '0') { ?>
                                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                                <?php } else if ($row['status'] == 'proses') { ?>
                                                                                    <span class="badge bg-primary">Proses</span>
                                                                                <?php } else if ($row['status'] == 'tolak') { ?>
                                                                                    <span class="badge bg-danger">Tolak</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge bg-success">Selesai</span>
                                                                                <?php } ?>
                                                                            </td>

                                                                        </tr>



                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class=" col-md-4">
                                            <?php
                                            include '../php/koneksi/koneksi.php';

                                            $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM pengaduan WHERE status='ditolak'");
                                            // echo $cnt;

                                            $row = mysqli_fetch_array($cnt);

                                            $total = $row[0];
                                            // echo "Total rows: " . $total;
                                            ?>

                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3><?= $total ?></h3>

                                                    <p>Pengaduan Di Tolak</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <a type="button" class="small-box-footer" data-toggle="modal" data-target="#modal-tolak">
                                                    Cek Pengaduan&ensp;<i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>

                                            <div class="modal fade" id="modal-tolak">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tabel Pengaduan Di Tolak</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 10px">#</th>
                                                                        <!-- <th style="width: 150px">Foto</th> -->
                                                                        <th style="width: 150px">Tanggal Pengaduan</th>
                                                                        <th>Isi Pengaduan</th>
                                                                        <th style="width: 150px">Status</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $no = 1;
                                                                    $query = "SELECT * FROM pengaduan WHERE status='ditolak'";
                                                                    $result = mysqli_query($koneksi, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                                    ?>

                                                                        <tr>
                                                                            <td><?= $no++; ?></td>
                                                                            <!-- <td class="text-center">
                                                                            <img data-enlargable src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br> -->
                                                                            <!-- <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                                                <i class="fas fa-search-plus"></i> Lihat Gambar 
                                                                            </a> -->

                                                                            <!-- </td> -->
                                                                            <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                                            <td><?= $row['isi_laporan'] ?></td>
                                                                            <td class="text-center ">
                                                                                <?php if ($row['status'] == '0') { ?>
                                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                                <?php } else if ($row['status'] == 'proses') { ?>
                                                                                    <span class="badge bg-primary">Proses</span>
                                                                                <?php } else if ($row['status'] == 'ditolak') { ?>
                                                                                    <span class="badge bg-danger">Tolak</span>
                                                                                <?php } else { ?>
                                                                                    <span class="badge bg-success">Selesai</span>
                                                                                <?php } ?>
                                                                            </td>

                                                                        </tr>



                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class=" col-md-4">
                                            <div class="small-box bg-secondary">
                                                <div class="inner">
                                                    <h3>Segera Hadir</h3>

                                                    <p>Segera Hadir</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-tools"></i>
                                                </div>
                                                <a href="#" class="btn small-box-footer disabled">
                                                    Cek Pengaduan&ensp;<i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-12 -->
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
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
</body>

</html>