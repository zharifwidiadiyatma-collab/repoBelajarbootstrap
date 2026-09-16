<?php
include('crudmhs.php');
$nim = '1231100008';
$nama = 'Istina Putri';
$kelamin = 'P';
$jurusan= 'MI';

$hasil = tambahMhs($nim, $nama, $kelamin, $jurusan);
if($hasil > 0)
    header("Location: bacamhs2.php");
else{
    echo'Gagal menambah record';
}
?>