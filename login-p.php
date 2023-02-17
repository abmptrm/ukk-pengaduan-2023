<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Aplikasi Pengaduan Masyarakat</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1 href="login.php" class="h1 font-weight-bold">Login</h1>
            </div>
            <div class="card-body">
            <center><img src="assets/image/admin.png" alt="admin" width="70" class="mb-2"></center>
            <p class="login-box-msg font-weight-bold" style="font-size: 18px;"> Petugas/Admin</p>

                <?php 
                    if(isset($_GET['info'])){
                    if($_GET['info'] == "gagal"){ ?>
                        <div class="col-md-12">
                            <div class="card bg-gradient-danger">
                                
                                <div class="card-body text-center">
                                    Login Gagal! <br>
                                    Username & password salah!
                                </div>
                         
                            </div>
                        
                        </div>
                    <?php } else if($_GET['info'] == "logout"){ ?>
                        <div class="col-md-12">
                            <div class="card bg-gradient-success">
                                <!-- /.card-header -->  
                                <div class="card-body text-center">
                                Anda telah berhasil logout
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        
                    <?php }else if($_GET['info'] == "login"){ ?>
                        <div class="col-md-12">
                            <div class="card bg-gradient-info">
                                <!-- /.card-header -->
                                <div class="card-body text-center">
                                    Maaf anda harus login terlebih dahulu
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    <?php } } ?>

                    <br>

                <form action="php/cek_login/cek_petugas.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 ">
                        <input type="password" class="form-control" placeholder="Password" id="myPass" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" onclick="showPass()">
                                <label for="remember" style="font-size: 14px;">
                                    Tampilkan Password
                                </label>
                                
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block rounded-pill" name="masuk-petugas">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- <p class="mb-lg-4 mt-lg-4 text-center">
                    Sudah punya akun? <a href="daftar.html">Buat akun.</a>
                </p> -->

                <hr class="mt-3">

                <p class="mb-0 mt-3 text-center">
                    Login sebagai <a href="login.php" class="text-center">Masyarakat.</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    
    <script src="js/showPass.js "></script>
</body>

</html>


