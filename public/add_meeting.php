<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal Meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #34495e;
        }

        input[type="text"],
        input[type="datetime-local"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }

        #preview-time {
            text-align: center;
            color: #555;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Jadwal Meeting</h2>
    <form action="../config/process_meeting.php" method="POST">
        <label>Judul Meeting:</label>
        <input type="text" name="title" required>

        <label>Deskripsi:</label>
        <textarea name="description" placeholder="Opsional"></textarea>

        <label>Waktu Mulai:</label>
        <input type="datetime-local" name="start_time" required>
        <p id="preview-time"></p>

        <label>Lokasi:</label>
        <input type="text" name="location" placeholder="Opsional">

        <button type="submit">Simpan Jadwal</button>
    </form>
</div>

<!-- Preview waktu 24 jam -->
<script>
    const startTimeInput = document.querySelector('input[name="start_time"]');
    const preview = document.getElementById('preview-time');

    startTimeInput.addEventListener('input', function () {
        const raw = this.value;
        const date = new Date(raw);
        if (!isNaN(date)) {
            const year   = date.getFullYear();
            const month  = String(date.getMonth() + 1).padStart(2, '0');
            const day    = String(date.getDate()).padStart(2, '0');
            const hour   = String(date.getHours()).padStart(2, '0');
            const minute = String(date.getMinutes()).padStart(2, '0');

            const formatted = `${day}/${month}/${year} ${hour}:${minute}`;
            preview.textContent = "Waktu Dipilih: " + formatted;
        } else {
            preview.textContent = "";
        }
    });
</script>

</body>
</html>
