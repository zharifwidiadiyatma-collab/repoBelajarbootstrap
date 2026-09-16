<?php
session_start();

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $users=json_decode(
    file_get_contents('data/users.json'),
    true);

    foreach($users as $user)
    {
        if(
        $user['email']==$email &&
        password_verify(
        $password,
        $user['password']))
        {
            $_SESSION['user']=$user;

            header('Location:userdashboard.php');
        }
    }

    echo "Login gagal";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card">

<div class="card-header">
Login
</div>

<div class="card-body">

<form method="POST">

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Email">

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password">

<button
name="login"
class="btn btn-danger w-100">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>