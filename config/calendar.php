<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalender Jadwal Meeting</title>

    <!-- FullCalendar CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>

    <!-- Google Fonts & Custom Styling -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2a9d8f;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        #calendar {
            max-width: 90%;
            margin: auto;
            background: #ffffff;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .fc-toolbar-title {
            font-size: 1.4rem;
            color: #264653;
        }

        .fc-button {
            background-color: #2a9d8f;
            border: none;
            color: white;
            border-radius: 4px;
            font-weight: 600;
        }

        .fc-button:hover {
            background-color: #21867a;
        }

        .fc-view-harness {
            background-color: #f0fff5 !important;
        }
    </style>
</head>
<body>

    <h1>Kalender Jadwal Meeting</h1>

    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: 'get_events.php' // File PHP yang menampilkan data event dalam format JSON
            });
            calendar.render();
        });
    </script>

</body>
</html>
