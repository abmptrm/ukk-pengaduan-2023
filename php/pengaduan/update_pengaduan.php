<?php
    include '../koneksi/koneksi.php';

    if (isset($_POST['update'])) {
        
        $id_pengaduan = $_POST['id_pengaduan'];
        $tgl_pengaduan = date('Y-m-d');
        $nik = $_POST['nik'];
        $isi_laporan = $_POST['isi-laporan'];
        $foto = $_FILES['foto']['name'];

        if ($foto != "") {
            $ext_acc = array('png', 'jpg', 'jpeg');
            $x = explode('.', $foto);
            $extension = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];
            $random_number = rand(1, 999);
            $nama_foto_baru = $random_number.'-'.$foto;

            if (in_array($extension, $ext_acc) === true) {
                move_uploaded_file($file_tmp, '../../uploads/'.$nama_foto_baru);

                $query = "UPDATE pengaduan SET tgl_pengaduan='$tgl_pengaduan', nik='$nik', isi_laporan='$isi_laporan', foto='$nama_foto_baru' WHERE id_pengaduan='$id_pengaduan'";

                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    die("Query gagal dijalankan :".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi, $query));

                } else {
                    echo "<script>alert('Data Berhasil Di Update'); window.location='../../pengaduan.php'</script>";
                }
            } else {
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg dan png.');window.location='../../pengaduan.php';</script>";
            }

        }else {
            $id_pengaduan = $_POST['id_pengaduan'];
            $tgl_pengaduan = date('Y-m-d');
            $nik = $_POST['nik'];
            $isi_laporan = $_POST['isi-laporan'];
            $foto = $_POST['foto_lama'];
    

            $query = "UPDATE pengaduan SET tgl_pengaduan='$tgl_pengaduan', nik='$nik', isi_laporan='$isi_laporan', foto='$foto' WHERE id_pengaduan='$id_pengaduan'";

            $result = mysqli_query($koneksi, $query); 

            if (!$result) {
                die("Query gagal dijalankan :".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi, $query)
            );

            } else {
                echo "<script>alert('Data Berhasil Di Update'); window.location='../../pengaduan.php'</script>";
            }
        }

    } 
?>