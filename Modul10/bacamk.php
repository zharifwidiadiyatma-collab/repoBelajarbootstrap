<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
</head>
<body>
    <h2>Daftar Mata Kuliah</h2>
    <a href="tambahmk.php">Tambah Mata Kuliah</a><br><br>
    <?php
        require_once 'crudmk.php';
        $data = bacamk2("SELECT * FROM matakuliah");
        if ($data == null) {
            echo "<p>Belum ada data mata kuliah.</p>";
        } else {
    ?>
    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $mk) { ?>
        <tr>
            <td><?= htmlspecialchars($mk['kode']) ?></td>
            <td><?= htmlspecialchars($mk['nama']) ?></td>
            <td><?= htmlspecialchars($mk['sks']) ?></td>
            <!-- FIX: Gabung Hapus & Edit dalam 1 kolom, kirim kode ke konfirmasiubah -->
            <td>
                <a href="konfirmasihapusmk.php?kode=<?= urlencode($mk['kode']) ?>">Hapus</a> |
                <a href="konfirmasiubah.php?kode=<?= urlencode($mk['kode']) ?>">Edit</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
</body>
</html>
