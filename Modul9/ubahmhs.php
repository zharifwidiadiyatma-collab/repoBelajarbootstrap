<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td {
            border: 1px solid black;
            padding: 5px;
        }
    
</style>
</head>
<body>
    <?php
    include('crudMhs.php');
    // Memanggil fungsi baru yang sudah dibuat
    $data = bacaSemuaMhs();

    if($data == null){
        echo "Tidak ada data mahasiswa";
    } else {
    ?>
    <form action="konfirmasiubah.php" method="get">
        <table>
            <tr>
                <td>NIM</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Jurusan</td>
                <td>Proses</td>
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
                <td><a href='konfirmasiubah.php?nim=$nim'>Ubah</a></td>
            </tr>
            ";
        }
        echo '</table>';
    }
    ?>
        </table>
    </form>
</body>
</html>