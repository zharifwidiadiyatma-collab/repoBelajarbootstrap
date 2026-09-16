<?php
require_once 'koneksiakad.php'; 

function bacamk2($sql){
    $koneksi = koneksiAkademik();
    $hasil = mysqli_query($koneksi, $sql);
    if(!$hasil){
        die("Gagal query: " . mysqli_error($koneksi));
    }
    $data = [];
    while($row = mysqli_fetch_assoc($hasil)){
        $data[] = $row;
    }
     mysqli_free_result($hasil);
     mysqli_close($koneksi);
     return $data;
}

// PERBAIKAN: Tambahkan parameter $sks
function tambahMk($kode, $matakuliah, $sks){
    $koneksi = koneksiAkademik();

    $cek = mysqli_query($koneksi, "SELECT kode FROM matakuliah WHERE kode='$kode'");
    if(mysqli_num_rows($cek) > 0){
        mysqli_close($koneksi);
        header("Location: gagaltambahmk.php?alasan=duplikat");
        exit();
    }

    // PERBAIKAN: Sesuaikan query INSERT dengan menambahkan kolom SKS
    $sql = "INSERT INTO matakuliah VALUES('$kode', '$matakuliah', '$sks')";
    $hasil = 0;
    if(mysqli_query($koneksi, $sql))
        $hasil = 1;
    mysqli_close($koneksi);
    return $hasil;
}

function hapusMk($kode){
    $koneksi = koneksiAkademik();
    $sql = "DELETE FROM matakuliah WHERE kode='$kode'";
    if(!mysqli_query($koneksi, $sql)){
        die("Gagal menghapus: " . mysqli_error($koneksi));
    }
    mysqli_close($koneksi);
}
?>