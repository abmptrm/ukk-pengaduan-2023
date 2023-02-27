<?php
    
    include '../koneksi/koneksi.php';

    if (isset($_POST['simpan_tanggapan'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $tgl_tanggapan = date('Y-m-d');
        $tanggapan = $_POST['isi_tanggapan'];
        $id_petugas = $_POST['id_petugas'];
        $status = $_POST['status'];


        mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
        mysqli_query($koneksi, "INSERT INTO tanggapan VALUES (NULL, '$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");
        
        header('location: ../../petugas/data_pengaduan.php');

    } 

?>
