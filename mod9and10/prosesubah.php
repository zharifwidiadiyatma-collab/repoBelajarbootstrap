<?php
// FIX: include crudmhs.php (huruf kecil konsisten, bukan crudMhs.php)
include("crudmhs.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim     = $_POST['nim']     ?? '';
    $nama    = $_POST['nama']    ?? '';
    $kelamin = $_POST['kelamin'] ?? '';
    $jurusan = $_POST['jurusan'] ?? '';

    if ($nim == '' || $nama == '' || $kelamin == '' || $jurusan == '') {
        header("Location: bacamhs2.php");
        exit();
    }

    // FIX: Fungsi ubahMhs() sudah ditambahkan ke crudmhs.php
    ubahMhs($nim, $nama, $kelamin, $jurusan);

    // FIX: Redirect ke bacamhs2.php (lebih konsisten daripada ubahmhs.php)
    header("Location: bacamhs2.php");
    exit();
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>
