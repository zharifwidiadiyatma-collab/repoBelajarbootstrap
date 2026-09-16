<?php

$books=json_decode(
file_get_contents(
'..data/books.json'),
true);

?>

<!DOCTYPE html>
<html>
<head>

<title>Katalog Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Katalog Buku</h2>

<div class="row">

<?php foreach($books as $book){ ?>

<div class="col-md-3">

<div class="card mb-3">

<div class="card-body">

<h5>
<?= $book['judul'] ?>
</h5>

<p>
<?= $book['penulis'] ?>
</p>

<p>
<?= $book['status'] ?>
</p>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>