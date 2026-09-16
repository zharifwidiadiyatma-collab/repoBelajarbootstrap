<?php
    function judul(){
        echo "<h2> Praktikum Pemprogramman Web!</h2>";
    }
    function garis(){
        echo "<br>======================================</br>";
    }

    function mhs($nim, $nama, $semester){
        echo "NIM : $nim<br>";
        echo "Nama : $nama<br>";
        echo "Semester : $semester<br>";
    }

    judul();
    garis();

    mhs("980999977","Umar Bakri",3);
    garis();
?>

