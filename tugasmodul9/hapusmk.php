<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Mata Kuliah</title>
</head>
<body>
    <?php
        require_once 'crudmk.php';
        $kode = $_GET['kode'] ?? '';

        if($kode == ''){
            echo "<p>Kode mata kuliah tidak ditemukan.</p>";
        } else {
            $data = bacamk2("SELECT * FROM matakuliah WHERE kode='$kode'");
            if($data == null){
                echo "<p>Mata kuliah tidak ditemukan.</p>";
            } else {
    ?>
    <h2>Hapus Mata Kuliah</h2>
   <h5>Apakah Anda yakin ingin menghapus data mata kuliah dengan Kode : <?php echo $kode; ?>?</h5>
    

    <a href="konfirmasihapusmk.php?kode=<?= $kode ?>">Ya, Hapus</a> |
    <a href="bacamk.php">Batal</a>
    <?php } } ?>
</body>
</html>