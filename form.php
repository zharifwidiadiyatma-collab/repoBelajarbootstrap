<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
</head>
<body>

<form name="form" action="proses.php" method="post">
 Nilai : <input type="text" name="angka" /><br>
 Jurusan :
    <select name="jurusan">
        <option value="">Pilih</option>
        <option value="TI">Teknik Informatika</option>
        <option value="SI">Sistem Informasi</option>
        <option value="MI">Manajemen Informatika</option>
        <option value="TK">Teknik Komputer</option>
        <option value="KA">Komputerisasi Akuntansi</option>
    </select><br>

 <input type="submit" value="SUBMIT" />   
</form>

</body>
</html>
