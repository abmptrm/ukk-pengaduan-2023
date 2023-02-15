<?php

    $koneksi = mysqli_connect("localhost", "root", "", "ukk-pengaduan");
    if (mysqli_connect_errno()){
        echo "<h1 style='color:red;'>Error connecting :  " . mysqli_connect_error() . "</h1>";
    } 

?>


