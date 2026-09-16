<?php
include 'koneksidbmd8.php';

function getMahasiswa($koneksi) {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    return $data;
}
$siswa = getMahaSiswa($koneksi);
?>