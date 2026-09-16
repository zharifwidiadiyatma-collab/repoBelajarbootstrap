<?php
include "crudmhs.php";

$nim     = $_POST['nim']     ?? '';
$nama    = $_POST['nama']    ?? '';
$kelamin = $_POST['kelamin'] ?? '';
$jurusan = $_POST['jurusan'] ?? '';


if ($nim == '' || $nama == '' || $kelamin == '' || $jurusan == '') {
    header("Location: gagaltambah.php");
    exit();
}
tambahMhs($nim, $nama, $kelamin, $jurusan);
header("Location: bacamhs2.php");
exit();
?>