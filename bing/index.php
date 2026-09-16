<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pink Library</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="hero">
    <div class="container">

        <h1>Sistem Peminjaman Buku Perpustakaan</h1>

        <p>Cari dan pinjam buku favoritmu</p>

        <form action="userkatalog.php" method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="cari"
                    class="form-control"
                    placeholder="Cari Judul Buku">

                <button class="btn btn-light">
                    Cari
                </button>

            </div>

        </form>

    </div>
</section>

<div class="container mt-5">

    <h2>Buku Populer</h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Laskar Pelangi</h5>

                    <p>Andrea Hirata</p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>