<?php
require_once 'crudmk.php';

$kode = $_POST['kode'] ?? '';
$nama = $_POST['nama'] ?? '';
$sks  = $_POST['sks'] ?? '';

// Validasi field kosong
if ($kode == '' || $nama == '' || $sks == '') {
    header("Location: tambahmk.php");
    exit();
}

tambahMk($kode, $nama, $sks);

header("Location: bacamk.php");
exit();
?>
