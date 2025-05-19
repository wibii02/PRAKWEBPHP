<?php
session_start();

// cek apakah user sudah login, jika iya langsung redirect ke home.php
if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit();
}

// cek apakah ada error login dari URL parameter
$error_msg = '';
if (isset($_GET['error']) && $_GET['error'] == 1) {
    $error_msg = 'Login gagal: username atau password salah.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
</head>
<body>
    <?php if ($error_msg): ?>
        <p style="color:red;"><?= htmlspecialchars($error_msg) ?></p>
    <?php endif; ?>

    INI FORM POST
    <form method="POST" action="/wibii/process_login.php">
        <input name="username" type="text" placeholder="Masukan Username" required />
        <input name="password" type="password" placeholder="Masukan Password" required />
        <button type="submit">SUBMIT</button>
    </form> 
</body>
</html>
