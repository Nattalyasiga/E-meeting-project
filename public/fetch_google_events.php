<?php
session_start();
require_once '../config/google-config.php'; // Memanggil konfigurasi Google API

// Pastikan token akses ada di session
if (!isset($_SESSION['access_token']) || $_SESSION['access_token'] == '') {
    header('Location: google_auth.php'); // Jika belum login, arahkan ke halaman login Google
    exit();
}

$client->setAccessToken($_SESSION['access_token']);
$service = new Google_Service_Calendar($client);

// Ambil daftar event dari Google Calendar
$calendarId = 'primary'; // Bisa diganti dengan ID kalender lain
$events = $service->events->listEvents($calendarId);

// Menampilkan event
if (count($events->getItems()) == 0) {
    echo 'Tidak ada acara yang ditemukan.';
} else {
    foreach ($events->getItems() as $event) {
        echo 'Nama Event: ' . $event->getSummary() . '<br>';
        echo 'Waktu Mulai: ' . $event->getStart()->getDateTime() . '<br>';
        echo 'Waktu Selesai: ' . $event->getEnd()->getDateTime() . '<br><br>';
    }
}
?>
