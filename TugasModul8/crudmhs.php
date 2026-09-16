<?php
require_once 'koneksiakad.php'; 

function bacamhs2($sql){
    $data = array();
    $koneksi = koneksiAkademik(); 
    $hasil = mysqli_query($koneksi, $sql);
    if (!$hasil) {
        return null;
    }

    if (mysqli_num_rows($hasil) == 0) {
        mysqli_close($koneksi);
        return null;
    }

    while($baris = mysqli_fetch_assoc($hasil)){
        $data[] = array(
            'nim' => $baris['nim'],
            'nama' => $baris['nama'],
            'kelamin' => $baris['kelamin'],
            'jurusan' => $baris['jurusan']
        );
    }

    mysqli_close($koneksi);
    return $data;
}

// TUGAS 1: Ambil semua data
function bacaSemuaMhs(){
    $sql = "SELECT * FROM mahasiswa";
    return bacamhs2($sql);
}

// TUGAS 2: Filter per jurusan
function bacaMhsPerJurusan($jurusan){
    $koneksi = koneksiAkademik();
    $jurusanSafe = mysqli_real_escape_string($koneksi, $jurusan);
    $sql = "SELECT * FROM mahasiswa WHERE jurusan='$jurusanSafe'";
    return bacamhs2($sql);
} 


function cariMhsDariNama($nama){
    $koneksi = koneksiAkademik();
    $namaSafe = mysqli_real_escape_string($koneksi, $nama);
    // Menggunakan LIKE agar bisa mencari potongan nama
    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$namaSafe%'";
    return bacamhs2($sql);
}
// Pastikan strukturnya seperti ini di crudmhs.php
function cariMhsDariNim($nim){
    $koneksi = koneksiAkademik();
    $nimSafe = mysqli_real_escape_string($koneksi, $nim);
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nimSafe'";
    $data = bacamhs2($sql);

    return ($data != null) ? $data[0] : null;
}
?>