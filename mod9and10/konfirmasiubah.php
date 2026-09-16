<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <?php
    // FIX: include crudmhs.php (huruf kecil konsisten)
    include("crudmhs.php");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $nim = $_GET['nim'] ?? '';

        if ($nim == '') {
            echo "<p>NIM tidak ditemukan.</p>";
            exit();
        }

        // FIX: Fungsi cariMhs() sudah ditambahkan ke crudmhs.php
        $hasil = cariMhs($nim);

        if (!$hasil) {
            echo "<p>Data mahasiswa tidak ditemukan.</p>";
            exit();
        }

        $nama    = $hasil['nama'];
        $kelamin = $hasil['kelamin'];
        $jurusan = $hasil['jurusan'];
    }
    ?>
    <h2>Form Ubah Data Mahasiswa</h2>
    <form action="prosesubah.php" method="post">
        <table>
            <tr>
                <td>NIM:</td>
                <td><input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    <input type="radio" name="kelamin" value="L" <?= $kelamin == 'l' ? 'checked' : '' ?>> Laki-laki
                    <input type="radio" name="kelamin" value="P" <?= $kelamin == 'p' ? 'checked' : '' ?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Jurusan:</td>
                <td>
                    <?php
                    $jurusanList = ['MI', 'TK', 'KA', 'TI', 'SI'];
                    foreach ($jurusanList as $j) {
                        $checked = ($jurusan == $j) ? 'checked' : '';
                        echo "<input type='radio' name='jurusan' value='$j' $checked> $j ";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Ubah">
                    <input type="button" value="Batal" onclick="window.location.href='bacamhs2.php'">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
