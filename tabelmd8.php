<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
   <table border="1">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelamin</th>
            <th>Jurusan</th>
        </tr>
        <?php while($data = mysqli_fetch_array($query)):?>
        <tr>
            <td><?php echo $data['nim'];?></td>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['kelamin'];?></td>
            <td><?php echo $data['jurusan'];?></td>
        </tr>
        <?php endwhile;?>
        </table>
</body>
</html>    