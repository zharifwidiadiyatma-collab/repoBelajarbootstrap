<?php
require_once 'koneksiakad.php';

function bacamhs2($sql) {
    $data = array();
    $koneksi = koneksiAkademik();
    $hasil = mysqli_query($koneksi, $sql);
    if (!$hasil) {
        mysqli_close($koneksi);
        return null;
    }
    if (mysqli_num_rows($hasil) == 0) {
        mysqli_close($koneksi);
        return null;
    }
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $data[] = array(
            'nim'     => $baris['nim'],
            'nama'    => $baris['nama'],
            'kelamin' => $baris['kelamin'],
            'jurusan' => $baris['jurusan']
        );
    }
    mysqli_close($koneksi);
    return $data;
}

// Ambil semua data mahasiswa
function bacaSemuaMhs() {
    $sql = "SELECT * FROM mahasiswa";
    return bacamhs2($sql);
}

// Tambah mahasiswa baru
function tambahMhs($nim, $nama, $kelamin, $jurusan) {
    $koneksi = koneksiAkademik();

    // Cek duplikat dengan prepared statement
    $stmt = mysqli_prepare($koneksi, "SELECT nim FROM mahasiswa WHERE nim=?");
    mysqli_stmt_bind_param($stmt, "s", $nim);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($koneksi);
        header("Location: gagaltambah.php?alasan=duplikat");
        exit();
    }
    mysqli_stmt_close($stmt);

    // Insert dengan prepared statement (aman dari SQL Injection)
    $stmt = mysqli_prepare($koneksi, "INSERT INTO mahasiswa (nim, nama, kelamin, jurusan) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $nim, $nama, $kelamin, $jurusan);
    $hasil = mysqli_stmt_execute($stmt) ? 1 : 0;
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $hasil;
}

// FIX: Fungsi cariMhs() yang dipanggil konfirmasiubah.php tapi belum ada
function cariMhs($nim) {
    $koneksi = koneksiAkademik();
    $stmt = mysqli_prepare($koneksi, "SELECT * FROM mahasiswa WHERE nim=?");
    mysqli_stmt_bind_param($stmt, "s", $nim);
    mysqli_stmt_execute($stmt);
    $hasil = mysqli_stmt_get_result($stmt);
    $data  = mysqli_fetch_assoc($hasil);
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $data;
}

// FIX: Fungsi ubahMhs() yang dipanggil prosesubah.php & tesubah.php tapi belum ada
function ubahMhs($nim, $nama, $kelamin, $jurusan) {
    $koneksi = koneksiAkademik();
    $stmt = mysqli_prepare($koneksi, "UPDATE mahasiswa SET nama=?, kelamin=?, jurusan=? WHERE nim=?");
    mysqli_stmt_bind_param($stmt, "ssss", $nama, $kelamin, $jurusan, $nim);
    $hasil = mysqli_stmt_execute($stmt) ? 1 : 0;
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $hasil;
}

// Hapus mahasiswa berdasarkan NIM
function hapusMhs($nim) {
    $koneksi = koneksiAkademik();
    $stmt = mysqli_prepare($koneksi, "DELETE FROM mahasiswa WHERE nim=?");
    mysqli_stmt_bind_param($stmt, "s", $nim);
    if (!mysqli_stmt_execute($stmt)) {
        die('Error: ' . mysqli_error($koneksi));
    }
    $hasil = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
    return $hasil;
}

// Filter per jurusan
function bacaMhsPerJurusan($jurusan) {
    $koneksi = koneksiAkademik();
    $jurusanSafe = mysqli_real_escape_string($koneksi, $jurusan);
    mysqli_close($koneksi);
    return bacamhs2("SELECT * FROM mahasiswa WHERE jurusan='$jurusanSafe'");
}

// Cari mahasiswa dari nama (LIKE)
function cariMhsDariNama($nama) {
    $koneksi = koneksiAkademik();
    $namaSafe = mysqli_real_escape_string($koneksi, $nama);
    mysqli_close($koneksi);
    return bacamhs2("SELECT * FROM mahasiswa WHERE nama LIKE '%$namaSafe%'");
}

// Cari mahasiswa dari NIM (kembalikan 1 row)
function cariMhsDariNim($nim) {
    $koneksi = koneksiAkademik();
    $nimSafe = mysqli_real_escape_string($koneksi, $nim);
    mysqli_close($koneksi);
    $data = bacamhs2("SELECT * FROM mahasiswa WHERE nim='$nimSafe'");
    return ($data != null) ? $data[0] : null;
}
?>
