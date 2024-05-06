<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "alesha_laundry_db";

    $db = mysqli_connect($hostname, $username, $password, $database);

    if ($db->connect_error) {   
        echo "Koneksi Database Tidak Baik Baik Saja";
        die("ERROR !");
    }
?>