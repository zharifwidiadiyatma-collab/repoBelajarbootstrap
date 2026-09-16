<?php
include "crudMhs.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $jurusan = $_POST['jurusan'];
    $hasil = ubahMhs($nim, $nama, $kelamin, $jurusan);
    header("Location: ubahmhs.php");
} else {
    echo "Data tidak ditemukan";
    exit;
}
?>