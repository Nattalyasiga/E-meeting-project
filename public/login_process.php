<?php
require_once '../config/db.php'; // Atau sesuaikan dengan path-nya

// Gunakan nama variabel koneksi dari db.php, misalnya: $conn
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header("Location: dashboard.php");
    } else {
        echo "Login gagal. Periksa email dan password Anda.";
    }
}
?>
