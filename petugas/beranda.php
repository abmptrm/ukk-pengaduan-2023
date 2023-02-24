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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

                    <a href="../assets/index3.html" class="navbar-brand">
                        <!-- <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                        <span class="brand-text font-weight-normal text-primary">Aplikasi Pengaduan Masyarakat</span>
                    </a>
                </div>


                <ul class="navbar-nav text-center" style="font-size:17px">
                    <li class="nav-item">
                        <a href="beranda.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_pengaduan.html" class="nav-link">Tulis Pengaduan</a>
                    </li>

                </ul>

                <div class="nav-item">
                    <a class="nav-link" href="login.html">
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
                <div class="container ">
                    <div class="row ">

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

                                            <div class="small-box bg-secondary">
                                                <div class="inner pl-3">
                                                  <h3><?= $total ?></h3>
                                  
                                                  <p>Pengaduan Masuk</p>
                                                </div>
                                                <div class="icon">
                                                  <i class="fa fa-tasks"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">
                                                
                                                </a>
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
                                                <a href="#" class="small-box-footer">
                                                </a>
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
                                                <a href="#" class="small-box-footer">
                                                </a>
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
                                                <a href="#" class="small-box-footer">
                                                </a>
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
                                                <a href="#" class="small-box-footer">
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