<?php
require_once 'koneksiakad.php';

function bacamk2($sql) {
    $koneksi = koneksiAkademik();
    $hasil = mysqli_query($koneksi, $sql);
    if (!$hasil) {
        die("Gagal query: " . mysqli_error($koneksi));
    }
    $data = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $data[] = $row;
    }
    mysqli_free_result($hasil);
    mysqli_close($koneksi);
    return $data;
}

function tambahMk($kode, $matakuliah, $sks) {
    $koneksi = koneksiAkademik();

    // Cek duplikat dengan prepared statement
    $stmt = mysqli_prepare($koneksi, "SELECT kode FROM matakuliah WHERE kode=?");
    mysqli_stmt_bind_param($stmt, "s", $kode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($koneksi);
        header("Location: tambahmk.php?alasan=duplikat");
        exit();
    }
    mysqli_stmt_close($stmt);

    // Insert dengan prepared statement (aman dari SQL Injection)
    $stmt = mysqli_prepare($koneksi, "INSERT INTO matakuliah (kode, nama, sks) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $kode, $matakuliah, $sks);
    $hasil = mysqli_stmt_execute($stmt) ? 1 : 0;
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $hasil;
}

function hapusMk($kode) {
    $koneksi = koneksiAkademik();

    // Hapus dengan prepared statement (aman dari SQL Injection)
    $stmt = mysqli_prepare($koneksi, "DELETE FROM matakuliah WHERE kode=?");
    mysqli_stmt_bind_param($stmt, "s", $kode);
    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal menghapus: " . mysqli_error($koneksi));
    }
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}

// FIX: Fungsi baru untuk mencari satu mata kuliah berdasarkan kode
function cariMtKuliah($kode) {
    $koneksi = koneksiAkademik();
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM matakuliah WHERE kode=?");
    mysqli_stmt_bind_param($stmt, "s", $kode);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($hasil);
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $data;
}

// FIX: Fungsi baru untuk mengubah data mata kuliah
function ubahMtKuliah($kode, $nama, $sks) {
    $koneksi = koneksiAkademik();
    $stmt = mysqli_prepare($koneksi, "UPDATE matakuliah SET nama=?, sks=? WHERE kode=?");
    mysqli_stmt_bind_param($stmt, "sis", $nama, $sks, $kode);
    $hasil = mysqli_stmt_execute($stmt) ? 1 : 0;
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $hasil;
}
?>
