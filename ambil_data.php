<?php
    include 'php/koneksi/koneksi.php';

    session_start();

    if(isset($_POST["nik"]))  {
        $output = '';
        // $id = $_POST["id"];
        $nik = $_SESSION['nik'];
        $query = "SELECT * FROM pengaduan WHERE nik='$nik'";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $output = '  
                <p><img src="uploads/'.$row["foto"].'" class="img-responsive img-thumbnail" /></p>
                <p><b>Tanggal Pengaduan : </b><br /> '.$row['tgl_pengaduan'].'</p>
                <p><b>Isi Pengaduan : </b><br />'.$row['isi_laporan'].'</p>
                <p><b>Status : </b>'.$row['status'].'</p>
                
                
            ';  
        }  

    }  
?>

<!-- "SELECT pengaduan.*, tanggapan.tanggapan, tanggapan.tgl_tanggapan
                FROM pengaduan LEFT JOIN tanggapan
                ON tanggapan.id_pengaduan = pengaduan.id_pengaduan
                WHERE nik = $nik" -->