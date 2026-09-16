<?php
include('crudmhs.php');

if(isset($_GET['nim'])){
    $nim = $_GET['nim'];
    
    hapusmhs($nim);
    header("Location: bacamhs2.php");
    exit();
} else {
    header("Location: hapusmhs.php");
    exit();
}