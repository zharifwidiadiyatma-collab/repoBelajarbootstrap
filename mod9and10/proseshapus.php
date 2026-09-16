<?php
include('crudmhs.php');

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    // FIX: Nama fungsi harus hapusMhs() bukan hapusmhs() — PHP case-sensitive untuk beberapa versi
    hapusMhs($nim);
    header("Location: bacamhs2.php");
    exit();
} else {
    header("Location: bacamhs2.php");
    exit();
}
?>
