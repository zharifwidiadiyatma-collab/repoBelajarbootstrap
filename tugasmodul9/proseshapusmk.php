<?php
require_once 'crudmk.php';

$kode = $_GET['kode'] ?? '';

if($kode == ''){
    header("Location: bacamk.php");
    exit();
}

hapusMk($kode);

header("Location: bacamk.php");
exit();
?>