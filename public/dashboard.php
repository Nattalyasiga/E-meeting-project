<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_name']) && isset($_COOKIE['user_email'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['user_name'] = $_COOKIE['user_name'];
        $_SESSION['user_email'] = $_COOKIE['user_email'];
    } else {
        header("Location: login.php");
        exit();
    }
}

$user_name = $_SESSION['user_name'] ?? 'Nata';
$user_email = $_SESSION['user_email'] ?? 'Email Tidak Ditemukan';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-Meeting</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2d3e50;
            padding: 20px;
            color: white;
            flex-shrink: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .header {
            background-color: #3498db;
            padding: 15px 25px;
            color: white;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        .dashboard-welcome {
            text-align: center;
            margin-bottom: 40px;
        }

        .dashboard-welcome h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #2c3e50;
        }

        .card p {
            margin: 5px 0;
            color: #555;
        }

        .card a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 16px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .card a:hover {
            background-color: #2980b9;
        }

        /* Responsive: Stack sidebar on top for small screens */
        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                text-align: center;
            }
            .sidebar ul {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .sidebar ul li {
                margin: 5px;
            }
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>📅 E-Meeting</h2>
        <ul>
            <li><a href="dashboard.php">🏠 Dashboard</a></li>
            <li><a href="add_meeting.php">➕ Tambah Jadwal</a></li>
            <li><a href="list_meetings.php">📋 Daftar Meeting</a></li>
            <li><a href="profile.php">👤 Profil</a></li>
            <li><a href="schedule.php">📆 Jadwal</a></li>
            <li><a href="settings.php">⚙️ Pengaturan</a></li>
            <li><a href="logout.php">🚪 Logout</a></li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <div class="header">
            <h1>Selamat Datang di E-Meeting</h1>
        </div>

        <div class="dashboard-welcome">
            <h2>Halo, <?= htmlspecialchars($user_name) ?> 👋</h2>
            <p>Kelola pertemuan Anda dengan mudah dan efisien.</p>
        </div>

        <div class="card">
            <h3>👤 Informasi Pengguna</h3>
            <p><strong>Nama:</strong> <?= htmlspecialchars($user_name) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user_email) ?></p>
        </div>
    </div>
</div>

</body>
</html>
