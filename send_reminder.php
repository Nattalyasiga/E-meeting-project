<?php
require 'app/controllers/MeetingController.php';

$controller = new MeetingController();
$controller->sendMeetingReminders();  // Kirim pengingat meeting
?>
