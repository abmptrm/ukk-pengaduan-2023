<?php
    session_start();

    if ($_SESSION['status'] != "login") {
        header("location: login.php?pesan=belum_login");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Masyarakat</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <div class="title">

                    <a href="index.php" class="navbar-brand">
                        <!-- <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                        <span class="brand-text font-weight-normal text-primary">Aplikasi Pengaduan Masyarakat</span>
                    </a>
                </div>


                <ul class="navbar-nav text-center" style="font-size:17px">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="pengaduan.php" class="nav-link active">Tulis Pengaduan</a>
                    </li>

                </ul>

                <div class="nav-item">
                    <a class="nav-link" href="login.php">
                        <i class="fas fa-user"></i>
                        LOGIN
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
                                    <h5 class="card-title m-0" style="font-size:30px">Tulis Pengaduan</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Foto</th>
                                                <th>Tanggal Pengaduan</th>
                                                <th>Isi Pengaduan</th>
                                                <th>Status</th>
                                                <th style="width: 150px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1.</td>
                                                <td class="text-center"><img src="assets/image/Screenshot (1).png"
                                                        width="150"></td>
                                                <td class="text-center pt-4">
                                                    2023-12-09
                                                </td>
                                                <td> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum
                                                    quidem nostrum inventore. Error aliquam quod quibusdam porro, sequi
                                                    debitis consequatur?</td>
                                                <td class="text-center pt-4"><span
                                                        class="badge badge-success px-3 py-2">Selesai</span></td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-warning m-1" data-toggle="modal"
                                                    data-target="#modal-edit">
                                                        <div class="fas fa-edit"></div>
                                                    </a>
                                                    <a href="" class="btn btn-danger m-1">
                                                        <div class="fas fa-trash"></div>
                                                    </a>


                                                </td>
                                            </tr>
                                            <!-- EDIT DATA MODAL -->

                                            <div class="modal fade" id="modal-edit">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Pengaduan </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">Isi
                                                                            Laporan</label>
                                                                        <textarea class="form-control"
                                                                            id="exampleFormControlTextarea1"
                                                                            rows="3"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFile">Upload Foto</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input"
                                                                                    id="exampleInputFile">
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Choose file</label>
                                                                            </div>
                                                                            <!-- <div class="input-group-append">
                                                                                <span class="input-group-text">Upload</span>
                                                                            </div> -->
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- /.card-body -->


                                                            </form>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-primary" name="simpan">Simpan
                                                                Pengaduan</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary px-4" data-toggle="modal"
                                        data-target="#modal-tambah">Tambah Pengaduan
                                    </button>
                                </div>
                            </div>
                            <!-- card------ -->

                            <!-- Modal Tambah -->
                            <?php  
                                include "php/koneksi/koneksi.php";
                                $masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username = '$_SESSION[username]'");
                                while ($data = mysqli_fetch_array($masyarakat)) {
                            ?>

                            <div class="modal fade" id="modal-tambah">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Pengaduan </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Isi
                                                            Laporan</label>
                                                        <input type="text" name="nik" value="<?= $data['nik'] ?>">
                                                        <textarea class="form-control"
                                                            id="exampleFormControlTextarea1"
                                                            rows="3" name="isi-laporan">
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Upload Foto</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose file</label>
                                                            </div>
                                                            <!-- <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                            </div> -->
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->


                                            </form>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary" name="simpan">Simpan
                                                Pengaduan</button>

                                            
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

                            <?php
                                }
                            ?>

                            

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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
</body>

</html>