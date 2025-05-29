<?php
require '../config/db.php';
require '../vendor/autoload.php';

$now = new DateTime();  // Ambil waktu saat ini
$nextHour = (clone $now)->modify('+1 hour');  // Ambil waktu 1 jam ke depan

// Query untuk memilih meeting yang mulai dalam 1 jam ke depan
$sql = "SELECT * FROM meetings WHERE start_time BETWEEN '{$now->format('Y-m-d H:i:s')}' AND '{$nextHour->format('Y-m-d H:i:s')}'";
echo "SQL Query: " . $sql . "<br>"; // Menampilkan query untuk debugging

// Eksekusi query
$result = $conn->query($sql);

// Periksa jika query gagal
if ($result === false) {
    echo "MySQL Error: " . $conn->error . "<br>"; // Tampilkan pesan error MySQL
} else {
    // Jika query berhasil, lakukan pengolahan hasil
    while ($row = $result->fetch_assoc()) {
        // Pastikan kolom email ada, jika tidak, beri pengecekan lebih lanjut
        if (!empty($row['email'])) {
            // Kirim email ke peserta
            $subject = "Reminder: {$row['title']}";
            $message = "Meeting akan dimulai pada {$row['start_time']}. Jangan lupa hadir!";
            mail($row['email'], $subject, $message);
            echo "Email reminder telah dikirim ke {$row['email']}<br>";
        } else {
            echo "Email untuk peserta tidak ditemukan.<br>";
        }
    }
}
?>
