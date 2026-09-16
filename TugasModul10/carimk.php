<?php
include ("crudmtkuliah.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="color: blue">Cari Mata Kuliah</h2>
    <form action="" method="post">
        <label for="kode">Kode:</label>
        <input type="text" name="kode" id="kode" value="" required>
        <input type="submit" value="Cari">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['kode'])) {
        $kode = $_POST['kode'];
        $hasil = cariMtkuliah($kode);

        echo "<h2> Data Mata Kuliah </h2>";

        if ($hasil) {
            echo "<p>Kode : " . htmlspecialchars($hasil['kode']) . "</br>";
            echo "Nama : " . htmlspecialchars($hasil['nama']) . "</br>";
            echo "SKS : " . htmlspecialchars($hasil['sks']) . "</p>";
        } else {
            echo "<p>Data tidak ditemukan.</p>";
        }
    }
    ?>
</body>