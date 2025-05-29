<!-- views/edit_meeting.php -->
<?php
// Menyertakan file koneksi database
require '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data meeting berdasarkan ID
    $result = $conn->query("SELECT * FROM meetings WHERE id = $id");
    $meeting = $result->fetch_assoc();
}
?>

<h2>Edit Meeting</h2>
<form method="post" action="edit_meeting.php?id=<?= $meeting['id'] ?>">
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?= $meeting['title'] ?>" required><br>

    <label for="date_time">Date & Time:</label>
    <input type="datetime-local" name="date_time" value="<?= date('Y-m-d\TH:i', strtotime($meeting['date_time'])) ?>" required><br>

    <input type="submit" name="update" value="Update Meeting">
</form>

<?php
// Update data meeting jika form disubmit
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $date_time = $_POST['date_time'];

    // Update data meeting di database
    $updateQuery = "UPDATE meetings SET title = '$title', date_time = '$date_time' WHERE id = $id";
    
    if ($conn->query($updateQuery)) {
        echo "Meeting updated successfully!";
        // Redirect setelah berhasil
        header("Location: meeting_list.php");
        exit;
    } else {
        echo "Error updating meeting: " . $conn->error;
    }
}
?>
