<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$userId   = $_SESSION['user']['id'];
$pinjaman = json_decode(file_get_contents('datapinjaman.json'), true);
if ($pinjaman === null) $pinjaman = [];

// Filter pinjaman milik user ini
$pinjamanAktif = array_filter($pinjaman, fn($p) => $p['user_id'] == $userId && $p['status'] === 'dipinjam');
$riwayat       = array_filter($pinjaman, fn($p) => $p['user_id'] == $userId && $p['status'] === 'dikembalikan');

$pesan = $_GET['pesan'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">

    <?php if ($pesan === 'pinjam_berhasil'): ?>
        <div class="alert alert-success alert-dismissible fade show">
            ✅ Buku berhasil dipinjam! Jangan lupa kembalikan tepat waktu.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php elseif ($pesan === 'kembali_berhasil'): ?>
        <div class="alert alert-info alert-dismissible fade show">
            📦 Buku berhasil dikembalikan. Terima kasih!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['user']['nama']) ?>!</h2>

    <!-- Statistik -->
    <div class="row mt-4 mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="text-danger"><?= count($pinjamanAktif) ?></h3>
                    <p class="mb-0">Buku Dipinjam</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="text-danger"><?= count($riwayat) ?></h3>
                    <p class="mb-0">Riwayat Pinjaman</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Buku yang sedang dipinjam -->
    <h4>📖 Buku yang Sedang Dipinjam</h4>
    <?php if (empty($pinjamanAktif)): ?>
        <p class="text-muted">Kamu belum meminjam buku apapun.
            <a href="userkatalog.php">Lihat katalog</a>
        </p>
    <?php else: ?>
        <div class="table-responsive mb-5">
            <table class="table table-bordered align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Sisa Hari</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pinjamanAktif as $p):
                        $today      = new DateTime();
                        $tglKembali = new DateTime($p['tanggal_kembali']);
                        $sisaHari   = (int) $today->diff($tglKembali)->format('%r%a');
                        $terlambat  = $sisaHari < 0;
                    ?>
                    <tr class="<?= $terlambat ? 'table-warning' : '' ?>">
                        <td><?= htmlspecialchars($p['book_judul']) ?></td>
                        <td><?= htmlspecialchars($p['book_penulis']) ?></td>
                        <td><?= $p['tanggal_pinjam'] ?></td>
                        <td><?= $p['tanggal_kembali'] ?></td>
                        <td>
                            <?php if ($terlambat): ?>
                                <span class="badge bg-danger">Terlambat <?= abs($sisaHari) ?> hari</span>
                            <?php elseif ($sisaHari <= 2): ?>
                                <span class="badge bg-warning text-dark"><?= $sisaHari ?> hari lagi</span>
                            <?php else: ?>
                                <span class="text-success"><?= $sisaHari ?> hari lagi</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="kembalikan.php?id=<?= $p['id'] ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Kembalikan buku ini?')">
                                Kembalikan
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <!-- Riwayat -->
    <?php if (!empty($riwayat)): ?>
        <h4>📋 Riwayat Pinjaman</h4>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Dikembalikan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_reverse(array_values($riwayat)) as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['book_judul']) ?></td>
                        <td><?= $p['tanggal_pinjam'] ?></td>
                        <td><?= $p['tanggal_kembali'] ?></td>
                        <td><?= $p['tanggal_aktual'] ?? '-' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <a href="userkatalog.php" class="btn btn-danger mt-3">
        📚 Pinjam Buku Lagi
    </a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
