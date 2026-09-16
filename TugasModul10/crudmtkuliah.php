<?php
require_once "koneksiakad.php";

function cariMtKuliah($kode){
    $koneksi = koneksiAkademik();
    $sql = "SELECT * FROM matakuliah WHERE kode='$kode'";
    $hasil = mysqli_query($koneksi, $sql);
     if(mysqli_num_rows($hasil)>0){
        $baris = mysqli_fetch_assoc($hasil);
        $data['kode'] = $baris['kode'];
        $data['nama'] = $baris['nama'];
        $data['sks'] = $baris['sks'];
       
        return $data;
    } else{
        mysqli_close($koneksi);
    }
    return null;
}
function ubahMtKuliah($kode,$nama,$sks){
    $koneksi = koneksiAkademik();
    $sql = "UPDATE matakuliah SET nama='$nama', sks='$sks' WHERE kode='$kode'";
    if(mysqli_query($koneksi, $sql)){
        
        return true;
    } else{
        return "Error mengubah record: " . mysqli_error($koneksi);
        
    }
    mysqli_close($koneksi);
    return null;
}
function bacaSemuaMtkuliah(){
    $sql = "SELECT * FROM matakuliah";
    $koneksi = koneksiAkademik();
    $hasil = mysqli_query($koneksi, $sql);
    $data = array();
    while($baris = mysqli_fetch_assoc($hasil)){
        $data[] = $baris;
    }
    mysqli_close($koneksi);
    return $data;
}