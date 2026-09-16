<?php
session_start();

$books = json_decode(file_get_contents('databooks.json'), true);
$pinjaman = json_decode(file_get_contents('datapinjaman.json'), true);

if ($books === null) $books = [];
if ($pinjaman === null) $pinjaman = [];

// Buku yang sedang dipinjam oleh user ini
$sedangDipinjam = [];
if (isset($_SESSION['user'])) {
    foreach ($pinjaman as $p) {
        if ($p['user_id'] == $_SESSION['user']['id'] && $p['status'] === 'dipinjam') {
            $sedangDipinjam[] = $p['book_id'];
        }
    }
}

$cari = isset($_GET['cari']) ? strtolower(trim($_GET['cari'])) : '';
if ($cari !== '') {
    $books = array_filter($books, function ($book) use ($cari) {
        return str_contains(strtolower($book['judul']), $cari) ||
               str_contains(strtolower($book['penulis']), $cari);
    });
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Katalog Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2>Katalog Buku</h2>

    <!-- Form pencarian -->
    <form action="userkatalog.php" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="cari" class="form-control"
                   placeholder="Cari judul atau penulis..."
                   value="<?= htmlspecialchars($cari) ?>">
            <button class="btn btn-danger">Cari</button>
            <?php if ($cari !== ''): ?>
                <a href="userkatalog.php" class="btn btn-outline-secondary">Reset</a>
            <?php endif; ?>
        </div>
    </form>

    <?php if ($cari !== ''): ?>
        <p>Hasil pencarian: <strong><?= htmlspecialchars($cari) ?></strong></p>
    <?php endif; ?>

    <div class="row">
        <?php if (empty($books)): ?>
            <p class="text-muted">Tidak ada buku ditemukan.</p>
        <?php else: ?>
            <?php foreach ($books as $book): ?>
                <?php
                    $sudahPinjam = in_array($book['id'], $sedangDipinjam);
                    $habis = $book['stok'] <= 0 || $book['status'] === 'Habis';
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5><?= htmlspecialchars($book['judul']) ?></h5>
                            <p class="text-muted mb-1"><?= htmlspecialchars($book['penulis']) ?></p>
                            <p class="mb-1"><small>Kategori: <?= htmlspecialchars($book['kategori']) ?></small></p>
                            <p class="mb-1"><small>Stok: <?= (int)$book['stok'] ?></small></p>
                            <span class="badge <?= $habis ? 'bg-danger' : 'bg-success' ?> mb-3">
                                <?= $habis ? 'Habis' : 'Tersedia' ?>
                            </span>

                            <div class="mt-auto">
                                <?php if (!isset($_SESSION['user'])): ?>
                                    <a href="login.php" class="btn btn-outline-danger btn-sm w-100">
                                        Login untuk Pinjam
                                    </a>
                                <?php elseif ($sudahPinjam): ?>
                                    <button class="btn btn-secondary btn-sm w-100" disabled>
                                        ✅ Sedang Dipinjam
                                    </button>
                                <?php elseif ($habis): ?>
                                    <button class="btn btn-secondary btn-sm w-100" disabled>
                                        Stok Habis
                                    </button>
                                <?php else: ?>
                                    <a href="pinjam.php?id=<?= $book['id'] ?>"
                                       class="btn btn-danger btn-sm w-100"
                                       onclick="return confirm('Pinjam buku \'<?= htmlspecialchars($book['judul'], ENT_QUOTES) ?>\'? Durasi 7 hari.')">
                                        📖 Pinjam
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
