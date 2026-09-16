<?php
include('crudmhs.php'); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cari Data Mahasiswa</h4>
        </div>
        <div class="card-body">
            
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="nim" class="form-label fw-bold">Masukkan NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" 
                           value="<?= isset($_GET['nim']) ? htmlspecialchars($_GET['nim']) : '' ?>">
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Cari Data</button>
                    <a href="?" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            <?php
            if(isset($_GET['nim']) && $_GET['nim'] != ""){
                $nim = $_GET['nim'];
                $mhs = cariMhsDariNim($nim);

                if($mhs == null){
                    echo "
                    <div class='alert alert-danger mt-4' role='alert'>
                        NIM <strong>$nim</strong> tidak ditemukan dalam database.
                    </div>";
                } else {
            ?>
                <div class="mt-4 pt-3 border-top">
                    <h5 class="text-secondary mb-3">Hasil Pencarian:</h5>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th width="30%">NIM</th>
                            <td><?= htmlspecialchars($mhs['nim']); ?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><?= htmlspecialchars($mhs['nama']); ?></td>
                        </tr>
                        <tr>
                            <th>Kelamin</th>
                            <td><?= ($mhs['kelamin']=='L') ? 'Laki-laki' : 'Perempuan'; ?></td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td><?= htmlspecialchars($mhs['jurusan']); ?></td>
                        </tr>
                    </table>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>