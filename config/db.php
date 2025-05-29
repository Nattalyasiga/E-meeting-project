<?php
// Konfigurasi koneksi database
$host     = "localhost";
$user     = "root";
$password = ""; // kosongkan jika tidak ada password
$database = "e_meeting"; // sesuaikan dengan nama database kamu

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
