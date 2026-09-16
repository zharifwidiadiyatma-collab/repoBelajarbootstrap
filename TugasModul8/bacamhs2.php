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
            </tr>
            ";
        }
        echo '</table>';
    }
    ?>
</body>
</html>