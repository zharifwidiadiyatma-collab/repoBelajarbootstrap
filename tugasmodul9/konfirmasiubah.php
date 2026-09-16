<?php
include ("crudmtkuliah.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET' ){

$kode = $_GET['kode'];
$hasil = cariMtKuliah($kode);
$nama = $hasil['nama'];
$sks = $hasil['sks'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="prosesubah.php" method="post">
        <label for="kode">Kode:</label>
        <input type="text" name="kode" id="kode" value="<?php echo $kode; ?>" readonly><br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>"><br>
        <label for="sks">SKS:</label>
        <input type="text" name="sks" id="sks" value="<?php echo $sks; ?>"><br>
        <input type="submit" value="Ubah">
        <input type="button" value="Batal" onclick="window.location.href='ubahmtkuliah.php'">
    </form>
</body>
</html>