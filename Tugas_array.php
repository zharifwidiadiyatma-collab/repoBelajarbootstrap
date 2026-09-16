<?php
$data = [
    ["nama" => "Siti", "Kursus" => "HTML", "bayar" => 100],
    ["nama" => "Ani", "Kursus" => "CSS", "bayar" => 150],
    ["nama" => "Amir", "Kursus" => "JavaScript", "bayar" => 200],
    ["nama" => "Agus", "Kursus" => "Python", "bayar" => 250],
    ["nama" => "Minah", "Kursus" => "Java", "bayar" => 300],
    ["nama" => "Jarjit", "Kursus" => "PHP", "bayar" => 350]
];

 //echo json_encode($data);
?> 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas ARRAY</title>
 </head>
 <body>
    pilih kursus :
    <select name="kursus" id="kursus">
        <option value="">Pilih</option>
        <option value="HTML">HTML</option>
        <option value="CSS">CSS</option>
        <option value="JavaScript">JavaScript</option>
        <option value="Python">Python</option>
        <option value="Java">Java</option>
        <option value="PHP">PHP</option>
    </select>
    <br>
    <table width="400" border="1">
        <tr>
            <th>Nama</th>
            <th>Kursus</th>
            <th>Bayar</th>
        </tr>
        <?php 
        foreach ($data as $d) { 
            echo "<tr>";
            echo "<td>" . $d["nama"] . "</td>";
            echo "<td>" . $d["Kursus"] . "</td>";
            echo "<td>" . $d["bayar"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
 </body>
 </html>