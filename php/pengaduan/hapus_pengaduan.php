<?php
    include '../koneksi/koneksi.php';

    $id_pengaduan = $_GET['id_pengaduan'];

    // hapus gambar
    $result = mysqli_query($koneksi, "SELECT foto FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $file = mysqli_fetch_assoc($result);

    $namaFile = implode(".", $file);
    $lokasi = '../../uploads/' . $namaFile;

    if (file_exists($lokasi)) {
        unlink('../../uploads/'.$namaFile);
    }


    // Hapus Data
    mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");

    header('location: ../../pengaduan.php');
?>