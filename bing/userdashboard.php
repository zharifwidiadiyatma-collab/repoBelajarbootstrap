<?php
session_start();

if(!isset($_SESSION['user']))
{
    header('Location:../login.php');
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>
Selamat Datang
<?=
$_SESSION['user']['nama']
?>
</h2>

<div class="row">

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h3>3</h3>

<p>Buku Dipinjam</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h3>12</h3>

<p>Riwayat Pinjaman</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>