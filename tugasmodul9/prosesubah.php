<?php
include "crudmtkuliah.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];
    $hasil = ubahMtKuliah($kode, $nama, $sks);
    header("Location: ubahmtkuliah.php");
} else {
    echo "Data tidak ditemukan";
    exit;
}
?>