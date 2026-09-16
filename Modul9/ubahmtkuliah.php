<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mata Kuliah</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
    // FIX: include crudmk.php (bukan crudmtkuliah.php yang tidak ada)
    include('crudmk.php');

    // FIX: Ganti bacaSemuaMtkuliah() dengan bacamk2() yang sudah ada
    $data = bacamk2("SELECT * FROM matakuliah");

    if ($data == null) {
        echo "Tidak ada data mata kuliah";
    } else {
    ?>
    <h2>Daftar Mata Kuliah - Pilih untuk Diubah</h2>
    <table>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Proses</th>
        </tr>
        <?php foreach ($data as $mtkuliah) { ?>
        <tr>
            <td><?= htmlspecialchars($mtkuliah['kode']) ?></td>
            <td><?= htmlspecialchars($mtkuliah['nama']) ?></td>
            <td><?= htmlspecialchars($mtkuliah['sks']) ?></td>
            <td><a href="konfirmasiubah.php?kode=<?= urlencode($mtkuliah['kode']) ?>">Ubah</a></td>
        </tr>
        <?php } ?>
    </table>
    <!-- FIX: Hapus </table> ganda yang ada di kode asli -->
    <?php } ?>
    <br><a href="bacamk.php">Kembali ke Daftar</a>
</body>
</html>
