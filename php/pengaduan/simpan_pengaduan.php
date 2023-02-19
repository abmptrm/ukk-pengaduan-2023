<?php
    
    include "../koneksi/koneksi.php";

    session_start();

    if (isset($_POST['simpan-pengaduan'])){

        $isi_laporan = $_POST['isi-laporan'];
        $nik = $_POST['nik'];
        $tgl_pengaduan = date('Y-m-d');

        $rand = rand();
        $extension = array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['foto']['name'];
        $size = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $extension)){
            header("location: ../../pengaduan.php?pesan=extension");
        } else {
            if ($size < 1044070){
                $img = $rand.'_'.$filename;
                $move = '../../uploads/'.$img;
                move_uploaded_file($_FILES['foto']['tmp_name'], $move);
                mysqli_query($koneksi, "INSERT INTO pengaduan VALUES('', '$tgl_pengaduan', '$nik', '$isi_laporan', '$img', '0')");
                header('location: ../../pengaduan.php');
            }else {
                header("location: ../../pengaduan.php?pesan=gagal");
            }

        }

    }

?>