<?php
    session_start();

    include "php/koneksi/koneksi.php";

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

                                            <?php       
                                                $no = 1; 

                                                $nik = $_SESSION['nik'];

                                                $query = "SELECT * FROM pengaduan WHERE nik='$nik'";

                                                $result = mysqli_query($koneksi, $query);

                                                // Lakukan perulangan untuk membaca setiap baris hasil query
                                                while ($row = mysqli_fetch_assoc($result)) {   
                                                
                                            ?>

                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td class="text-center">
                                                    <img data-enlargable src="uploads/<?= $row['foto'] ?>"  width="150"><br>
                                                    <a type="button" data-toggle="modal" data-target="#modalviewimage<?= $row['id_pengaduan'] ?>" class="btn btn-sm btn-primary mt-2 px-3" onclick="ShowDetailImage()">
                                                        <i class="fa fa-expand"></i>&ensp; Lihat Gambar 
                                                    </a>
                                                    <!-- <a type="button" class="btn btn-sm btn-primary mt-2 px-3 view-image" id="<?= $_SESSION['nik'] ?>">
                                                        <i class="fa fa-expand"></i>&ensp; Lihat Gambar 
                                                    </a> -->
                                                </td>
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
                                                <td class="text-center">
                                                    <a href="" class="btn btn-info mx-2" data-toggle="modal"
                                                    data-target="#modal-edit">
                                                        <div class="fas fa-edit"></div>
                                                    </a>
                                                    <a href="" class="btn btn-danger mx-2">
                                                        <div class="fas fa-trash"></div>
                                                    </a>


                                                </td>
                                            </tr>
                                            

                                            <?php
                                                }
                                            ?>


                                            

                                            
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
                                $masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username='$_SESSION[username]'");
                                while ($data = mysqli_fetch_assoc($masyarakat)) {
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
                                            <form method="post" action="php/pengaduan/simpan_pengaduan.php" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Isi Laporan</label>
                                                        <input type="text" name="nik" value="<?= $data['nik']; ?>" hidden>
                                                        <textarea class="form-control" rows="3" name="isi-laporan" placeholder="Isi Laporan"></textarea>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="foto" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Upload Foto</label>
                                                        <div class="input-group mb-3">
                                                            <div class="custom-file">
                                                                
                                                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto"/>
                                                                <label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
                                                            </div>
                                                            <!-- <div class="input-group-append">
                                                                <button class="btn btn-dark">Upload </button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    

                                                </div>
                                                <!-- /.card-body -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary" name="simpan-pengaduan">Simpan
                                                        Pengaduan</button>
                                                        
                                                        
                                                    </div>
                                            </form>
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
                                            <form method="post" action="php/pengaduan/edit_pengaduan.php" enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Isi Laporan</label>
                                                        <input type="text" name="nik" value="<?= $data['nik']; ?>" hidden>
                                                        <textarea class="form-control"
                                                            rows="3" name="isi-laporan"
                                                            placeholder="Isi Laporan">
                                                        </textarea>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="inputGroupFile02"/>
                                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-default">Upload</button>
                                                        </div>
                                                    </div>
                                                    

                                                </div>
                                                <!-- /.card-body -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary" name="simpan-pengaduan">Simpan
                                                        Pengaduan</button>
                                                        
                                                        
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <!-- MODAL VIEW IMAGE -->
                            
                            <?php
                                include 'php/koneksi/koneksi.php';

                                $nik = $_SESSION['nik'];
                                $query = "SELECT * FROM pengaduan WHERE nik='$nik'";

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
                                            <img src="uploads/<?= $row['foto'] ?>" width="300">
                                            </div><hr>
                                            <div class="card-body">
                                            <div class="text-center">
                                                <?= $row['isi_laporan']?>
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>

    <!-- Show Filename In Input File Image -->
    <script src="js/showFilename.js"></script>



    <!-- AdminLTE for demo purposes -->
    <!-- <script src="assets/dist/js/demo.js"></script> -->

    
</body>

</html>