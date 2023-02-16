<?php
    include "../koneksi/koneksi.php";

    if (isset($_POST['daftar-masyarakat'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $telp = $_POST['no_telp'];

        mysqli_query($koneksi, "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telp')");

        header("location: ../../login.php");
    }
?>