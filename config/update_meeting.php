<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $location = $_POST['location'];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $stmt = $conn->prepare("UPDATE meetings SET title=?, description=?, start_time=?, end_time=?, location=? WHERE id=?");
    $stmt->bind_param("sssssi", $title, $description, $start_time, $end_time, $location, $id);

    if ($stmt->execute()) {
        echo "Jadwal Meeting berhasil diperbarui!";
        // Redirect kembali ke halaman list atau detail
        // header("Location: ../views/meetings_list.php");
    } else {
        echo "Gagal memperbarui jadwal.";
    }
}
?>
