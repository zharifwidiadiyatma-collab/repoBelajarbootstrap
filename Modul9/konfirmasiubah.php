<?php
include ("crudmhs.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET' ){

$nim = $_GET['nim'];
$hasil = cariMhs($nim);
$nama = $hasil['nama'];
$kelamin = $hasil['kelamin'];
$jurusan = $hasil['jurusan'];
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
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="<?php echo $nim; ?>" readonly><br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>"><br>
        <label for="kelamin">Jenis Kelamin:</label>
        <input type="text" name="kelamin" id="kelamin" value="<?php echo $kelamin; ?>"><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" value="<?php echo $jurusan; ?>"><br>
        <input type="submit" value="Ubah">
        <input type="button" value="Batal" onclick="window.location.href='ubahmhs.php'">
    </form>
</body>
</html>