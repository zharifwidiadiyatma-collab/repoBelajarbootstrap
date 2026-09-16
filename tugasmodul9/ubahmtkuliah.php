<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    
</style>
</head>
<body>
    <?php
    include('crudmk.php');
    // Memanggil fungsi baru yang sudah dibuat
    $data = bacaSemuaMtkuliah();

    if($data == null){
        echo "Tidak ada data mata kuliah";
    } else {
    ?>
    <form action="konfirmasiubah.php" method="get">
        <table>
            <tr>
                <td>Kode</td>
                <td>Nama</td>
                <td>SKS</td>
                <td>Proses</td>
            </tr>
            <?php
        foreach($data as $mtkuliah){
            $kode = $mtkuliah['kode'];
            $nama = $mtkuliah['nama'];
            $sks = $mtkuliah['sks'];
            echo "
            <tr>
                <td>$kode</td>
                <td>$nama</td>
                <td>$sks</td>
                <td><a href='konfirmasiubah.php?kode=$kode'>Ubah</a></td>
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