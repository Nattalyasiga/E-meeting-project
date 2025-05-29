<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | E-Meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .checkbox {
            margin-top: 10px;
        }

        .error-msg {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login E-Meeting</h2>

    <!-- Tampilkan error jika ada -->
    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-msg"><?= $_SESSION['login_error']; ?></div>
        <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?>

    <!-- Form login -->
    <form action="login_process.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <div class="checkbox">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
