<?php
    session_start();

    include "../php/koneksi/koneksi.php";

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../login-p.php?info=login");
    }

?>

<!DOCTYPE html>
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

                    <a href="index.php" class="navbar-brand">
                        <!-- <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                        <span class="brand-text font-weight-normal text-primary">Aplikasi Pengaduan Masyarakat</span>
                    </a>
                </div>


                <ul class="navbar-nav text-center" style="font-size:17px">
                    <li class="nav-item">
                        <a href="beranda.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_pengaduan.php" class="nav-link active">Data Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_tanggapan.php" class="nav-link">Data Tanggapan</a>
                    </li>

                </ul>

                <div class="nav-item">
                    <a class="nav-link bg-danger font-weight-bold rounded" href="../logout.php">
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
                                    <div class="card-title">
                                        <h5 class=" m-0" style="font-size:30px">Data Pengaduan</h5>
                                    </div>
                                    <!-- <div class="card-tools">
                                        <button type="button" class="btn btn-success px-4" data-toggle="modal"
                                            data-target="#modal-tambah"><i class="fas fa-plus"></i>&ensp;Tambah Pengaduan
                                        </button>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th style="width: 150px">Foto</th>
                                                <th style="width: 150px">Tanggal Pengaduan</th>
                                                <th>Isi Pengaduan</th>
                                                <th style="width: 150px">Status</th>
                                                <th style="width: 150px">Aksi</th>
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
                                                    <td class="text-center">
                                                        <img data-enlargable src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; " width="200"><br>
                                                        <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                            <i class="fas fa-search-plus"></i> Lihat Gambar
                                                        </a>

                                                    </td>
                                                    <td class="text-center "><?= $row['tgl_pengaduan'] ?></td>
                                                    <td><?= $row['isi_laporan'] ?></td>
                                                    <td class="text-center ">
                                                        <?php if ($row['status'] == '0') { ?>
                                                            <span class="badge bg-warning">Menunggu</span>
                                                        <?php } else if ($row['status'] == 'proses') { ?>
                                                            <span class="badge bg-primary">Di Proses</span>
                                                        <?php } else if ($row['status'] == 'ditolak') { ?>
                                                            <span class="badge bg-danger">Di Tolak</span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-success">Selesai</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="" class="btn btn-info mx-2" data-toggle="modal" data-target="#modal-tanggapi<?= $row['id_pengaduan'] ?>">
                                                            <i class="fas fa-edit"></i> Tanggapi
                                                        </a>
                                                        <!-- <a href="php/pengaduan/hapus_pengaduan.php?id_pengaduan=<?php echo $row['id_pengaduan'] ?>" class="btn btn-danger mx-2">
                                                        <div class="fas fa-trash"></div>
                                                    </a> -->


                                                    </td>
                                                </tr>

                                                <!-- MODAL EDIT DATA -->
                                                <div class="modal fade" id="modal-tanggapi<?= $row['id_pengaduan'] ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Verifikasi dan Isi Tanggapan</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="../php/tanggapan/simpan_tanggapan.php" enctype="multipart/form-data">
                                                                    <div class="card-body">
                                                                        <input type="hidden" name="id_pengaduan" value="<?= $row['id_pengaduan']; ?>">

                                                                        <?php

                                                                        $id_petugas = $_SESSION['id_petugas'];

                                                                        ?>
                                                                        <input type="hidden" name="id_petugas" value="<?= $id_petugas ?>">  
                                                                        
                                                                        <div class="form-group">
                                                                            <label>Verifikasi</label>
                                                                            <select class="form-control" name="status">
                                                                                <option value="proses">Proses</option>
                                                                                <option value="ditolak">Tolak</option>
                                                                                <option value="selesai">Selesai</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Isi Tanggapan</label>
                                                                            <textarea class="form-control" rows="3" name="isi_tanggapan" placeholder="Isi Tanggapan"></textarea>

                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary" name="simpan_tanggapan">Simpan
                                                                            Tanggapan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>


                                            <?php
                                            }
                                            ?>





                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                            <!-- card------ -->


                            <!-- MODAL VIEW IMAGE -->

                            <?php
                            include '../php/koneksi/koneksi.php';

                            $query = "SELECT * FROM pengaduan";

                            $result = mysqli_query($koneksi, $query);

                            // Lakukan perulangan untuk membaca setiap baris hasil query
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <div class="modal fade" id="modalviewimage<?= $row['id_pengaduan'] ?>" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Foto Pengaduan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <img src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; width:100%;">
                                                </div>
                                                <hr>
                                                <div class="card-body">
                                                    <div class="text-left">
                                                        <ul>
                                                            <li><b>Tanggal Pengaduan :</b> <?= $row['tgl_pengaduan'] ?></li>
                                                            <li><b>Isi Pengaduan : </b> <?= $row['isi_laporan'] ?></li>
                                                            <li><b>Status Pengaduan : </b>
                                                                <?php if ($row['status'] == '0') { ?>
                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                <?php } else if ($row['status'] == 'proses') { ?>
                                                                    <span class="badge bg-primary">Di Proses</span>
                                                                <?php } else if ($row['status'] == 'tolak') { ?>
                                                                    <span class="badge bg-danger">Di Tolak</span>
                                                                <?php } else { ?>
                                                                    <span class="badge bg-success">Selesai</span>
                                                                <?php } ?>
                                                            </li>



                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>

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

    <!-- Show Filename In Input File Image -->
    <script src="js/showFilename.js"></script>



    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../assets/dist/js/demo.js"></script> -->


</body>

</html>