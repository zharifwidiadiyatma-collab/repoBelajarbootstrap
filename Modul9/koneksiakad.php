<?php
function koneksiAkademik() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "zharif_akademik";

    $koneksi = mysqli_connect($hostname, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }
    
    return $koneksi;
}
?>