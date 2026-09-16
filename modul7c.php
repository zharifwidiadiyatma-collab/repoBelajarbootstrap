<!DOCTYPE html>
<html>

<head>
    <title>Regitrasi Peserta</title>
</head>

<body>
    <h2>Registrasi Peserta Kursus</h2>

    <table>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" size="30"></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="text" name="email" size="30"></td>
            </tr>
            <tr>
                <td>Nama Kursus</td>
                <td>
                    <input type="checkbox" name="kursus[]" value="csharp">C#<br>
                    <input type="checkbox" name="kursus[]" value="javascript">JavaScript<br>
                    <input type="checkbox" name="kursus[]" value="perl" />Perl<br>
                    <input type="checkbox" name="kursus[]" value="php" />PHP<br>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Simpan"> </td>
                <td><input type="submit" name="submit" value="Reset"> </td>
            </tr> 
        </form>
    </table>
    <fieldset>
        <legend>TERIMAKASIH DATA ANDA TELAH DITERIMA</legend>
        <?php 

        function biaya() {
            $harga = count($_POST['kursus']) * 1000000;
            return $harga;
        }
        
if (array_key_exists('nama', $_POST)) {
 $nama = trim($_POST['nama']);
    if(empty($nama))
    echo "<span style='color:red'>Nama belum diisi</span><br>";
}
if (array_key_exists('email', $_POST)) {
 $email = trim($_POST['email']);
 if(empty($email))
 echo "<span style='color:red'>Email belum diisi</span><br>";
}

if (isset($_POST['kursus'])) 
    $kursus = $_POST['kursus'];
if (empty($kursus)) {
    echo "<span style='color:red'>Pilih satu kursus</span><br>";
}else{
    $jumlah_kursus = count($kursus);
    echo "Kursus yang dipilih sebanyak $jumlah_kursus :<br>";
    echo "<ul>";
    foreach ($kursus as $k) {
        echo "<li>$k</li>";
    }
    echo "</ul>";
    echo "Total Biaya: Rp. " . number_format(biaya(), 0, ',', '.');
} 
?>
    </fieldset>
</body>

</html>