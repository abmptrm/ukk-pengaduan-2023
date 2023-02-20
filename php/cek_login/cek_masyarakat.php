<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi/koneksi.php';

	if (isset($_POST['masuk_masyarakat'])) {
		// menangkap data yang dikirim dari form login
		$username = mysqli_real_escape_string($koneksi, $_POST['username']);
		$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));


		// menyeleksi data user dengan username dan password yang sesuai
		$login = mysqli_query($koneksi, "select * from masyarakat where username='$username' and password='$password'");
		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);
		$ktl = mysqli_fetch_array($login);

		// cek apakah username dan password di temukan pada database
		if($cek > 0){

			$_SESSION['username'] = $username;
			$_SESSION['nik'] = $ktl['nik'];
			$_SESSION['nama'] = $nama;
			$_SESSION['status'] = "login";
			header("location: ../../index.php");

			
		}else{
			header("location: ../../login.php?info=gagal");
		}
	}



?>