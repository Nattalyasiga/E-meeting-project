<?php
// config/email.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Sesuaikan dengan lokasi autoload.php jika menggunakan Composer

function sendMeetingReminder($toEmail, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Pengaturan SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';  // Ganti dengan server SMTP Anda
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com';  // Ganti dengan email pengirim
        $mail->Password = 'your-email-password';  // Ganti dengan password email pengirim
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Pengaturan pengirim dan penerima
        $mail->setFrom('your-email@example.com', 'Meeting Reminder');
        $mail->addAddress($toEmail);  // Alamat email penerima

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Reminder email has been sent.';
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>
