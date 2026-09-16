<?php

if (isset($_POST['register'])) {
    $users = json_decode(
        file_get_contents('datauser.json'),
        true
    );

    if ($users === null) {
        $users = [];
    }

    $users[] = [
        "id"       => time(),
        "nama"     => $_POST['nama'],
        "email"    => $_POST['email'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
        "role"     => "user"
    ];

    file_put_contents(
        'datauser.json',
        json_encode($users, JSON_PRETTY_PRINT)
    );

    $sukses = "Registrasi berhasil! Silakan login.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Daftar Akun Baru</div>
                <div class="card-body">

                    <?php if (isset($sukses)): ?>
                        <div class="alert alert-success"><?= $sukses ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <input
                            name="nama"
                            class="form-control mb-3"
                            placeholder="Nama Lengkap"
                            required>

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

                        <button name="register" class="btn btn-success w-100">
                            Daftar
                        </button>
                    </form>

                    <p class="mt-3 text-center">
                        Sudah punya akun? <a href="login.php">Login di sini</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
