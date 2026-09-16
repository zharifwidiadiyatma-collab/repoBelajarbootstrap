<?php
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
} else {
    // Ubah hapusmhs.php menjadi bacamhs2.php
    header("Location: bacamhs2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus</title>
</head>
<body>
    <h2>Apakah Anda yakin ingin menghapus data mahasiswa dengan NIM : <?php echo $nim; ?>?</h2>
    
    <form action="proseshapus.php" method="get">
        <input type="hidden" name="nim" value="<?php echo $nim; ?>">
        
        <button type="submit">Oke</button>
        
        <a href="bacamhs2.php"><button type="button">Batal</button></a>
    </form>
</body>
</html>