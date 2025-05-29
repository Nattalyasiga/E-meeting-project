<?php
require_once '../config/db.php';

// Ambil ID dari parameter URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Ambil data meeting berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM meetings WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$meeting = $result->fetch_assoc();

// Validasi jika data tidak ditemukan
if (!$meeting) {
    echo "Meeting tidak ditemukan.";
    exit;
}
?>

<h2>Edit Jadwal Meeting</h2>
<form action="../config/update_meeting.php" method="POST">
    <input type="hidden" name="id" value="<?= $meeting['id'] ?>">

    <label>Judul Meeting:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($meeting['title']) ?>" required><br>

    <label>Deskripsi:</label>
    <textarea name="description"><?= htmlspecialchars($meeting['description']) ?></textarea><br>

    <label>Waktu Mulai:</label>
    <input type="datetime-local" name="start_time" value="<?= date('Y-m-d\TH:i', strtotime($meeting['start_time'])) ?>" required><br>

    <label>Waktu Selesai:</label>
    <input type="datetime-local" name="end_time" value="<?= date('Y-m-d\TH:i', strtotime($meeting['end_time'])) ?>" required><br>

    <label>Lokasi:</label>
    <input type="text" name="location" value="<?= htmlspecialchars($meeting['location']) ?>"><br>

    <button type="submit">Update Jadwal</button>
</form>
