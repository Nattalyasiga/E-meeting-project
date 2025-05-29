<?php
require_once '../config/db.php'; // Pastikan path ini benar

$filterDate = $_GET['date'] ?? null;

if ($filterDate) {
    $sql = "SELECT * FROM meetings WHERE DATE(start_time) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $filterDate);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM meetings ORDER BY start_time ASC");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Meeting</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Daftar Jadwal Meeting</h2>

    <form method="GET">
        <label for="date">Filter berdasarkan tanggal:</label>
        <input type="date" name="date" id="date" value="<?= htmlspecialchars($filterDate) ?>">
        <button type="submit">Filter</button>
    </form>

    <table>
        <tr>
            <th>Judul</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Aksi</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= $row['start_time'] ?></td>
                    <td><?= $row['end_time'] ?></td>
                    <td>
                        <a href="edit_meeting.php?id=<?= $row['id'] ?>">Edit</a> |
                        <a href="delete_meeting.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">Tidak ada data meeting.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
