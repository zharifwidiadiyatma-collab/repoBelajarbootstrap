<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: userdashboard.php');
    exit;
}

$pinjamanId = (int) $_GET['id'];
$userId     = $_SESSION['user']['id'];

$books    = json_decode(file_get_contents('databooks.json'), true);
$pinjaman = json_decode(file_get_contents('datapinjaman.json'), true);

if ($books === null) $books = [];
if ($pinjaman === null) $pinjaman = [];

$error = null;
$found = false;

foreach ($pinjaman as $i => $p) {
    if ($p['id'] == $pinjamanId && $p['user_id'] == $userId && $p['status'] === 'dipinjam') {
        // Tandai sebagai dikembalikan
        $pinjaman[$i]['status']          = 'dikembalikan';
        $pinjaman[$i]['tanggal_aktual']  = date('Y-m-d');
        $found = true;

        // Kembalikan stok buku
        foreach ($books as $j => $b) {
            if ($b['id'] == $p['book_id']) {
                $books[$j]['stok'] += 1;
                $books[$j]['status'] = 'Tersedia';
                break;
            }
        }
        break;
    }
}

if (!$found) {
    $error = "Data pinjaman tidak ditemukan atau bukan milikmu.";
}

if ($error === null) {
    file_put_contents('datapinjaman.json', json_encode($pinjaman, JSON_PRETTY_PRINT));
    file_put_contents('databooks.json', json_encode($books, JSON_PRETTY_PRINT));

    header('Location: userdashboard.php?pesan=kembali_berhasil');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kembalikan Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="text-danger">❌ Gagal Mengembalikan</h4>
                    <p><?= htmlspecialchars($error) ?></p>
                    <a href="userdashboard.php" class="btn btn-danger">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
