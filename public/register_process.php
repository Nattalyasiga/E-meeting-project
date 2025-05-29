<?php
require '../config/db.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Cek apakah email sudah terdaftar
    $cek_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $cek_email->bind_param("s", $email);
    $cek_email->execute();
    $cek_email->store_result();

    if ($cek_email->num_rows > 0) {
        echo "Email sudah terdaftar! Gunakan email lain.";
        $cek_email->close();
        $conn->close();
        exit();
    }
    $cek_email->close();

    // Siapkan query untuk insert
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error); // Menangani error jika prepare gagal
    }

    // Bind parameter untuk query
    $stmt->bind_param("sss", $name, $email, $password);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Pendaftaran berhasil! Silakan lanjut ke halaman <a href='login.php'>login</a>.";
    } else {
        echo "Gagal mendaftar! Error: " . $stmt->error; // Jika eksekusi gagal
    }

    // Tutup statement dan koneksi
    $stmt->close();
} else {
    echo "Form belum disubmit!";
}

$conn->close();
?>
