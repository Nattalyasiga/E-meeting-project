<?php
require_once '../config/db.php';

// Ambil data dari tabel meetings
$query = "SELECT * FROM meetings";
$result = $conn->query($query);

// Cek apakah query berhasil
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Meeting</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Daftar Jadwal Meeting</h2>

<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= $row['start_time'] ?> - <?= $row['end_time'] ?></td>
            <td><?= htmlspecialchars($row['location']) ?></td>
            <td>
                <a href="edit_meeting.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete_meeting.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                <a href="sync_google_calendar.php?id=<?= $row['id'] ?>" >Sync</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
