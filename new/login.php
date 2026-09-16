<?php
session_start();

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $users = json_decode(
        file_get_contents('datauser.json'),
        true
    );

    foreach ($users as $user) {
        if (
            $user['email'] == $email &&
            password_verify($password, $user['password'])
        ) {
            $_SESSION['user'] = $user;
            header('Location: userdashboard.php');
            exit;
        }
    }

    $error = "Email atau password salah.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <input
                            type="email"
                            name="email"
                            class="form-control mb-3"
                            placeholder="Email"
                            required>

                        <input
                            type="password"
                            name="password"
                            class="form-control mb-3"
                            placeholder="Password"
                            required>

                        <button name="login" class="btn btn-danger w-100">
                            Login
                        </button>
                    </form>

                    <p class="mt-3 text-center">
                        Belum punya akun? <a href="register.php">Daftar di sini</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
