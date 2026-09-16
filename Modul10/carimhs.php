<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Mahasiswa</title>
</head>
<body>
    <h1>Pencarian Mahasiswa</h1>
    
    <form action="" method="post">
        <label for="NIM">NIM:</label>
        <input type="text" name="NIM" id="NIM" value="<?php echo isset($_POST['NIM']) ? htmlspecialchars($_POST['NIM']) : ''; ?>" required>
        <input type="submit" value="Cari">
    </form>

    <?php
    require_once "crudmhs.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['NIM'])) {
        $nim = $_POST['NIM'];
        $hasil = cariMhs($nim);

        
        echo "<h2> Data Mahasiswa </h2>";
        
        if ($hasil) {
           
            echo "<p>NIM : " . htmlspecialchars($hasil['nim'])."</br>" ;
            echo "Nama : " . htmlspecialchars($hasil['nama']) ."</br>";
            echo "Kelamin : " . htmlspecialchars($hasil['kelamin']) . "</br>";
            echo "Jurusan : " . htmlspecialchars($hasil['jurusan']) . "</p>";
        } else {
            echo "<p>Data tidak ditemukan.</p>";
        }
    }
    ?>
</body>
</html>
