<?php
include('crudMhs.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa (bacaMhs2)</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <?php
    // Memanggil fungsi baru yang sudah dibuat
    $data = bacaSemuaMhs();

    if($data == null){
        echo "Tidak ada data mahasiswa";
    } else {
    ?>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Proses</th>
        </tr>
        <?php
        foreach($data as $mhs){
            $nim = $mhs['nim'];
            $nama = $mhs['nama'];
            $kelamin = $mhs['kelamin'];
            $jurusan = $mhs['jurusan'];
            echo "
            <tr>
                <td>$nim</td>
                <td>$nama</td>
                <td>$kelamin</td>
                <td>$jurusan</td>
                <td><a href='konfirmasihapus.php?nim=$nim'>Hapus</a></td>
            </tr>
            ";
        }
        echo '</table>';
    }
    ?>
    <p><a href="tambahmhs.php">Tambah Data Mahasiswa</a></p>
</body>
</html>