<?php

if(isset($_POST['register']))
{
    $users=json_decode(
    file_get_contents('datauser.json'),
    true);

    $users[]=[
        "id"=>time(),
        "nama"=>$_POST['nama'],
        "email"=>$_POST['email'],
        "password"=>password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT),
        "role"=>"user"
    ];

    file_put_contents(
    'data/users.json',
    json_encode(
    $users,
    JSON_PRETTY_PRINT));

    echo "Registrasi berhasil";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<form method="POST">

<input
name="nama"
class="form-control mb-3"
placeholder="Nama">

<input
name="email"
class="form-control mb-3"
placeholder="Email">

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password">

<button
name="register"
class="btn btn-success">

Daftar

</button>

</form>

</div>

</body>
</html>