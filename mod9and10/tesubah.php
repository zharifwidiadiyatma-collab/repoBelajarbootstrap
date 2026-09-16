<?php
include ("crudmhs.php");

$nim = 133110011;
$nama = "Siti Zulaika";
$kelamin = "P";
$jurusan = "MI";
$hasil = ubahMhs($nim, $nama, $kelamin, $jurusan);

if($hasil == true){
    echo "Berhasil";
} else {
    echo "Error";
}
?>