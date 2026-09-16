<?php
session_start();

// Hanya user login yang bisa meminjam
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: userkatalog.php');
    exit;
}

$bookId   = (int) $_GET['id'];
$userId   = $_SESSION['user']['id'];
$durasi   = 7; // hari

// Baca data buku
$books = json_decode(file_get_contents('databooks.json'), true);
$pinjaman = json_decode(file_get_contents('datapinjaman.json'), true);

if ($books === null) $books = [];
if ($pinjaman === null) $pinjaman = [];

// Cari buku
$bookIndex = null;
foreach ($books as $i => $b) {
    if ($b['id'] === $bookId) {
        $bookIndex = $i;
        break;
    }
}

$error = null;

if ($bookIndex === null) {
    $error = "Buku tidak ditemukan.";
} elseif ($books[$bookIndex]['stok'] <= 0 || $books[$bookIndex]['status'] === 'Habis') {
    $error = "Stok buku habis, tidak bisa dipinjam.";
} else {
    // Cek apakah user sudah meminjam buku ini dan belum dikembalikan
    foreach ($pinjaman as $p) {
        if (
            $p['user_id'] == $userId &&
            $p['book_id'] == $bookId &&
            $p['status'] === 'dipinjam'
        ) {
            $error = "Kamu sudah meminjam buku ini dan belum mengembalikannya.";
            break;
        }
    }
}

if ($error === null) {
    // Tambah data pinjaman
    $pinjaman[] = [
        "id"              => time(),
        "user_id"         => $userId,
        "user_nama"       => $_SESSION['user']['nama'],
        "book_id"         => $bookId,
        "book_judul"      => $books[$bookIndex]['judul'],
        "book_penulis"    => $books[$bookIndex]['penulis'],
        "tanggal_pinjam"  => date('Y-m-d'),
        "tanggal_kembali" => date('Y-m-d', strtotime("+{$durasi} days")),
        "status"          => "dipinjam"
    ];

    // Kurangi stok buku
    $books[$bookIndex]['stok'] -= 1;
    if ($books[$bookIndex]['stok'] <= 0) {
        $books[$bookIndex]['status'] = 'Habis';
    }

    // Simpan perubahan
    file_put_contents('datapinjaman.json', json_encode($pinjaman, JSON_PRETTY_PRINT));
    file_put_contents('databooks.json', json_encode($books, JSON_PRETTY_PRINT));

    header('Location: userdashboard.php?pesan=pinjam_berhasil');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pinjam Buku</title>
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
                    <h4 class="text-danger">❌ Gagal Meminjam</h4>
                    <p><?= htmlspecialchars($error) ?></p>
                    <a href="userkatalog.php" class="btn btn-danger">Kembali ke Katalog</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
