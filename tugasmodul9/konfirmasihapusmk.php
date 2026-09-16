<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus</title>
</head>
<body>
    <?php
        require_once 'crudmk.php';
        $kode = $_GET['kode'] ?? '';

        if($kode == ''){
            echo "<p>Kode mata kuliah tidak ditemukan.</p>";
        } else {
    ?>
    <h2>Konfirmasi Hapus Mata Kuliah</h2>
    <p>Apakah kamu benar-benar yakin ingin menghapus mata kuliah dengan kode <b><?= $kode ?></b>?</p>
    <a href="proseshapusmk.php?kode=<?= $kode ?>">Ya, Hapus</a> |
    <a href="bacamk.php">Batal</a>
    <?php } ?>
</body>
</html>