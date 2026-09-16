<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <?php
    include('crudmhs.php');
    $data = bacaSemuaMhs();
    if ($data == null) {
        echo "<p>Tidak ada data mahasiswa.</p>";
    } else {
    ?>
    <table border="1">
        <p><a href="tambahmhs.php">Tambah Data Mahasiswa</a></p>
    <p><a href="carimhs.php">Cari Mahasiswa</a></p>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <!-- FIX: Satu kolom Proses untuk Hapus & Ubah -->
            <th>Proses</th>
        </tr>
        <?php foreach ($data as $mhs) { ?>
        <tr>
            <td><?= htmlspecialchars($mhs['nim']) ?></td>
            <td><?= htmlspecialchars($mhs['nama']) ?></td>
            <td><?= htmlspecialchars($mhs['kelamin']) ?></td>
            <td><?= htmlspecialchars($mhs['jurusan']) ?></td>
            
            <td>
                <a href="konfirmasihapus.php?nim=<?= urlencode($mhs['nim']) ?>">Hapus</a> |
                <a href="konfirmasiubah.php?nim=<?= urlencode($mhs['nim']) ?>">Ubah</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
    
</body>
</html>
