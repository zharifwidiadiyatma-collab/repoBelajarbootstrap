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
        if($data == null){
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
        <?php foreach($data as $mk){ ?>
        <tr>
            <td><?= $mk['kode'] ?></td>
            <td><?= $mk['nama'] ?></td>
            <td><?= $mk['sks'] ?></td>
            <td><a href="konfirmasihapusmk.php?kode=<?= $mk['kode'] ?>">Hapus</a></td>
            <td><a href="ubahmtkuliah.php">Edit</a></td>  
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
</body>
</html>