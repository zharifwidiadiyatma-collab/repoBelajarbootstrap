<?php
include 'crudmhs.php'; 

$jurusan = "";
$nama_cari = "";
$data = [];

// Logika Filter Jurusan
if (isset($_GET['jurusan'])) {
    $jurusan = $_GET['jurusan'];
    
    if ($jurusan == "SEMUA") {
        $data = bacaSemuaMhs(); // Memanggil fungsi ambil semua data
    } else {
        $data = bacaMhsPerJurusan($jurusan);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa Full Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4"> <h2 class="fw-bold">Daftar Mahasiswa</h2>
    
    <div class="mt-4">
        <p class="mb-1">Pilih jurusan:</p>
        <form method="GET" action="">
            <div class="d-flex gap-3 mb-2 flex-wrap">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan" value="SEMUA" id="ALL" <?= ($jurusan == 'SEMUA' || $jurusan == '') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="ALL">Semua</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan" value="TI" id="TI" <?= $jurusan == 'TI' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="TI">TI</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan" value="SI" id="SI" <?= $jurusan == 'SI' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="SI">SI</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan" value="MI" id="MI" <?= $jurusan == 'MI' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="MI">MI</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan" value="TK" id="TK" <?= $jurusan == 'TK' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="TK">TK</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jurusan" value="KA" id="KA" <?= $jurusan == 'KA' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="KA">KA</label>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-light border"> - OK - </button>
        </form>
    </div>

    <?php if (!empty($data) || $jurusan != ""): ?>
        <div class="mt-4">
            <p class="fw-bold">Jurusan: <?= ($jurusan == "SEMUA") ? "Semua Jurusan" : htmlspecialchars($jurusan) ?></p>
            
            <div class="table-responsive">
                <table class="table table-bordered border-dark">
                    <thead class="table-warning text-center">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <?php if($jurusan == "SEMUA") echo "<th>Jurusan</th>"; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data)): ?>
                            <tr><td colspan="4" class="text-center">Data tidak ditemukan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($data as $mhs): ?>
                            <tr>
                                <td class="text-center"><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td class="text-center"><?= $mhs['kelamin'] ?></td>
                                <?php if($jurusan == "SEMUA") echo "<td class='text-center'>".$mhs['jurusan']."</td>"; ?>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>


</body>
</html>