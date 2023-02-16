

<?php
    include 'php/koneksi/koneksi.php';

    $cnt = mysqli_query($koneksi, "SELECT COUNT(1) FROM petugas");
    // echo $cnt;

    $row = mysqli_fetch_array($cnt);

    $total = $row[0];
    echo "Total rows: " . $total;

    mysqli_close($koneksi);
?>


