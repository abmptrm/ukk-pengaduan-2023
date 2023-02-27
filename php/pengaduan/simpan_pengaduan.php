<?php
    
    include "../koneksi/koneksi.php";

    

    if (isset($_POST['simpan_pengaduan'])) {
        $isi_laporan = $_POST['isi_laporan'];
        $nik = $_POST['nik'];

        $tgl_pengaduan = date('Y-m-d');
        $rand = rand();
        $extension = array('png', 'jpg', 'jpeg');
        $filename = $_FILES['foto']['name'];
        $size = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        
        if (!in_array($ext, $extension)){
            echo "<script> alert('Extensi Hanya JPG, JPEG, Dan PNG'); window.location.href = '../../pengaduan.php'; </script>";
            
        } else {
            if ($size < 2044070){
                echo 'error';
                $img = $rand.'_'.$filename;
                $move = '../../uploads/'.$img;
                move_uploaded_file($_FILES['foto']['tmp_name'], $move);
                mysqli_query($koneksi, "INSERT INTO pengaduan VALUES(NULL, '$tgl_pengaduan', '$nik', '$isi_laporan', '$img', '0')");
                
            
                echo "<script> alert('Data Berhasil Di Uploads'); window.location.href = '../../pengaduan.php'; </script>";
            }else {
                echo "<script> alert('File Terlalu Besar! Harus Di Bawah 2MB'); window.location.href = '../../pengaduan.php?pesan=gagal'; </script>";
                
            }

        }
    } 

    

     

?>