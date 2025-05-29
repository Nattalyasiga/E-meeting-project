// app/controllers/MeetingController.php
require '../config/db.php';
require '../config/email.php';

class MeetingController {
    // Fungsi untuk mengambil semua meeting yang akan datang
    public function sendMeetingReminders() {
        global $conn;
        
        $currentDateTime = date('Y-m-d H:i:s');
        
        // Query untuk mendapatkan semua meeting yang akan datang dalam 1 jam
        $query = "SELECT * FROM meetings WHERE date_time > '$currentDateTime' AND date_time <= DATE_ADD('$currentDateTime', INTERVAL 1 HOUR)";
        $result = $conn->query($query);
        
        while ($row = $result->fetch_assoc()) {
            $meetingTitle = $row['title'];
            $meetingTime = $row['date_time'];
            $participantEmail = $row['participant_email'];  // Asumsi ada kolom untuk email peserta
            
            // Persiapkan pesan pengingat
            $subject = "Reminder: Meeting '$meetingTitle' is coming up!";
            $message = "Dear participant, <br><br> This is a reminder that your meeting titled <b>'$meetingTitle'</b> will take place at <b>$meetingTime</b>. <br><br> Don't forget to attend the meeting!";
            
            // Kirim email pengingat
            sendMeetingReminder($participantEmail, $subject, $message);
        }
    }
}
