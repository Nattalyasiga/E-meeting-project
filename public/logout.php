<?php
session_start();
session_unset();
session_destroy();

// Hapus cookie jika ada
setcookie("user_id", "", time() - 3600, "/");
setcookie("user_name", "", time() - 3600, "/");
setcookie("user_email", "", time() - 3600, "/");

header("Location: login.php");
exit();
?>
