<?php
session_start();

// Cek apakah user sudah login, jika tidak redirect ke login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Di sini Anda bisa menampilkan jadwal pertemuan, misalnya dari database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pertemuan</title>
</head>
<body>
    <h1>Jadwal Pertemuan Anda</h1>
    <p>Berikut adalah jadwal pertemuan yang telah Anda buat.</p>
    <!-- Anda bisa menampilkan daftar pertemuan di sini -->
</body>
</html>
