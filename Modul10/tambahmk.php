<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h2>Form Tambah Mata Kuliah</h2>

    <?php
    // FIX: Tampilkan pesan error jika kode duplikat
    if (isset($_GET['alasan']) && $_GET['alasan'] == 'duplikat') {
        echo "<p style='color:red;'>Kode mata kuliah sudah ada, gunakan kode lain.</p>";
    }
    ?>

    <form action="prosestambahmk.php" method="post">
        <table>
            <tr>
                <td>Kode:</td>
                <td><input type="text" name="kode" required></td>
            </tr>
            <tr>
                <td>Mata Kuliah:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>SKS:</td>
                <td><input type="number" name="sks" min="1" max="6" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <a href="bacamk.php">Kembali ke Daftar Mata Kuliah</a>
</body>
</html>
