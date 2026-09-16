<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
</head>
<body>
    <h2>Form Tambah Mata Kuliah</h2>
    <form action="prosestambahmk.php" method="post">
        <table>
            <tr>
                <td>Kode:</td>
                <td><input type="text" name="kode"></td>
            </tr>
            <tr>
                     <td>Mata Kuliah</td>
                    <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>SKS:</td>
                <td><input type="number" name="sks"></td>
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