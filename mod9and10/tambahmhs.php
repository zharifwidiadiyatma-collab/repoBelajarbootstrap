<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Form Masukan Data Mahasiswa</h2>
    <form action="prosestambah.php" method="post">
        <table>
            <tr>
                <td>NIM:</td>
                <td><input type="text" name="nim" required></td>
            </tr>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    <input type="radio" name="kelamin" value="L" required> Laki-laki
                    <input type="radio" name="kelamin" value="P"> Perempuan
                </td>
            </tr>
            <tr>
                <td>Jurusan:</td>
                <td>
                    <input type="radio" name="jurusan" value="MI" required> MI
                    <input type="radio" name="jurusan" value="TK"> TK
                    <input type="radio" name="jurusan" value="KA"> KA
                    <input type="radio" name="jurusan" value="TI"> TI
                    <input type="radio" name="jurusan" value="SI"> SI
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <!-- FIX: Tambah link kembali ke daftar -->
    <p><a href="bacamhs2.php">Kembali ke Daftar Mahasiswa</a></p>
</body>
</html>
