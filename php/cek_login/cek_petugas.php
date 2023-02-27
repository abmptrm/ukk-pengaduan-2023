<?php 
    // mengaktifkan session pada php
    session_start();

    // menghubungkan php dengan koneksi database
    include '../koneksi/koneksi.php';

    if (isset($_POST['masuk_petugas'])) {
        
        // menangkap data yang dikirim dari form login
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));


        // menyeleksi data user dengan username dan password yang sesuai
        $sql = "select * from petugas where username='$username' and password='$password'";
        $login = mysqli_query($koneksi, $sql);

        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($login);

        // cek apakah username dan password di temukan pada database
        if($cek > 0){
            
            $data = mysqli_fetch_assoc($login);

            // cek jika user login sebagai admin
            if($data['level']=="admin"){

                // buat session login dan username
                $_SESSION['id_petugas'] = $data['id_petugas'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['level'] = "admin";
                // alihkan ke halaman dashboard admin
                header("location: ../../administator/beranda.php");

            // cek jika user login sebagai pegawai
            }else if($data['level']=="petugas"){
                // buat session login dan username
                $_SESSION['id_petugas'] = $data['id_petugas'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['level'] = "petugas";
                // alihkan ke halaman dashboard pegawai
                header("location: ../../petugas/beranda.php");

            }else{

                // alihkan ke halaman login kembali
                header("location: ../../login-p.php?info=gagal");
            }	
        }else{
            header("location: ../../login-p.php?info=gagal");
        }
    }


?>