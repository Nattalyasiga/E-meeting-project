<?php
require_once 'db.php';
session_start();

// Ambil user ID dari sesi login (pastikan sebelumnya user sudah login)
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    die("User belum login.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $stmt = $conn->prepare("INSERT INTO meetings (user_id, title, start_time, end_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $start_time, $end_time);

    if ($stmt->execute()) {
        echo "Jadwal Meeting berhasil disimpan!";
    } else {
        echo "Gagal menyimpan jadwal: " . $stmt->error;
    }

    $stmt->close();
}
?>
