<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['user_name'] = $_COOKIE['user_name'];
    $_SESSION['user_email'] = $_COOKIE['user_email'];
}

$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil Pengguna</title>
</head>
<body>
    <h2>Profil Anda</h2>
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
</body>
</html>
