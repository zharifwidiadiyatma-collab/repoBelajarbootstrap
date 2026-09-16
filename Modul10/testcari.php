<?php 
include('crudmhs.php');

$nim = 133110006; // contoh NIM yang ingin dicari
$hasil = cariMhs($nim);
if($hasil != null){
    echo "Nama: ".$hasil['nama'];
} else{
    echo "Tidak ada data";
}

?>