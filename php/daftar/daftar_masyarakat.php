<?php
    include "../koneksi/koneksi.php";

    if (isset($_POST['daftarmasyarakat'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $telp = $_POST['notelp'];

        mysqli_query($koneksi, "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telp')");

        header("location: ../../login.php");
    }
?>