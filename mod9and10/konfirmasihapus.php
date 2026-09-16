<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus</title>
</head>
<body>
    <?php
    if (isset($_GET['nim'])) {
        $nim = htmlspecialchars($_GET['nim']);
    } else {
        header("Location: bacamhs2.php");
        exit();
    }
    ?>
    <h2>Apakah Anda yakin ingin menghapus data mahasiswa dengan NIM: <?= $nim ?>?</h2>

    <form action="proseshapus.php" method="get">
        <input type="hidden" name="nim" value="<?= $nim ?>">
        <button type="submit">Ya, Hapus</button>
        <!-- FIX: Tombol Batal seharusnya kembali ke daftar (bacamhs2.php), bukan ke hapusmhs.php -->
        <a href="bacamhs2.php"><button type="button">Batal</button></a>
    </form>
</body>
</html>
