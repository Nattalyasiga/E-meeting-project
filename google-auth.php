<?php
require __DIR__ . '/config/google-config.php';
$authUrl = $client->createAuthUrl();
echo "Redirecting to: " . filter_var($authUrl, FILTER_SANITIZE_URL); // Tambahkan echo untuk debugging
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
exit();
?>
