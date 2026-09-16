<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Mahasiswa</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php
    // FIX: include konsisten huruf kecil
    include('crudmhs.php');
    $data = bacaSemuaMhs();

    if ($data == null) {
        echo "<p>Tidak ada data mahasiswa.</p>";
    } else {
    ?>
    <h2>Pilih Mahasiswa yang Ingin Diubah</h2>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Proses</th>
        </tr>
        <?php foreach ($data as $mhs) { ?>
        <tr>
            <td><?= htmlspecialchars($mhs['nim']) ?></td>
            <td><?= htmlspecialchars($mhs['nama']) ?></td>
            <td><?= htmlspecialchars($mhs['kelamin']) ?></td>
            <td><?= htmlspecialchars($mhs['jurusan']) ?></td>
            <td><a href="konfirmasiubah.php?nim=<?= urlencode($mhs['nim']) ?>">Ubah</a></td>
        </tr>
        <?php } ?>
    </table>
    <!-- FIX: Hapus tag </table> ganda yang ada di kode asli -->
    <?php } ?>
    <br><a href="bacamhs2.php">Kembali ke Daftar</a>
</body>
</html>
