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
                    <input type="checkbox" name="kursus[]" value="csharp">C#(Biaya:Rp. 1.000.000,-)<br>
                    <input type="checkbox" name="kursus[]" value="javascript">JavaScript(Biaya:Rp. 500.000,-)<br>
                    <input type="checkbox" name="kursus[]" value="perl" />Perl(Biaya:Rp. 800.000,-)<br>
                    <input type="checkbox" name="kursus[]" value="php" />PHP(Biaya:Rp. 1.110.000,-)<br>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Simpan"> </td>
                
            </tr>
            
        </form>
    </table>
    <fieldset>
        <legend>TERIMAKASIH DATA ANDA TELAH DITERIMA</legend>
<?php 

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$kursus_dipilih = isset($_POST['kursus']) ? $_POST['kursus'] : [];


function hitungBiaya($pilihan) {
    $daftar_harga = [
        "csharp" => 1000000,     
        "javascript" => 500000,  
        "perl" => 800000,       
        "php" => 1110000         
    ];
    $total = 0;
    foreach ($pilihan as $item) {
        if (isset($daftar_harga[$item])) {
            $total += $daftar_harga[$item];
        }
    }
    return $total;
}


if (isset($_POST['submit'])) {
    
   
    if (empty($nama) || empty($email) || empty($kursus_dipilih)) {
        
        if (empty($nama)) echo "<span style='color:red'>Nama belum diisi</span><br>";
        if (empty($email)) echo "<span style='color:red'>Email belum diisi</span><br>";
        if (empty($kursus_dipilih)) echo "<span style='color:red'>Pilih minimal satu kursus</span><br>";
        
    } else {
        echo "Kursus yang dipilih sebanyak " . count($kursus_dipilih) . " :<br>";
        echo "<ul>";
        foreach ($kursus_dipilih as $k) {
            echo "<li>" . ($k) . "</li>";
        }
        echo "</ul>";
        echo "Total Biaya: <b>Rp. " . number_format(hitungBiaya($kursus_dipilih), 0, ',', '.') . "</b>";
    }
}
?>

    </fieldset>
</body>

</html>