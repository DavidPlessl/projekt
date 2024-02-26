<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url("../projekt/image1.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        .navbar {
            position: fixed;
            width: 100%;
            z-index: 1000;
            background-color: #343a40; /* Hintergrundfarbe der Navbar anpassen */
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff; /* Textfarbe der Navbar-Elemente anpassen */
        }

        .navbar-toggler-icon {
            background-color: #fff; /* Farbe des Navbar-Toggle-Icons anpassen */
        }

        .navbar-toggler {
            border-color: #fff; /* Farbe des Navbar-Toggle-Rahmens anpassen */
        }

        .navbar-toggler:hover,
        .navbar-toggler:focus {
            background-color: #fff; /* Hintergrundfarbe des Navbar-Toggles bei Hover/Fokus anpassen */
        }
    </style>
    <title>Menü</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Herzlich Willkommen im Menü!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="startseite.php">Startseite <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="einsaetze_melden.php">Einsätze melden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aktivitaeten_melden.php">Aktivitäten melden</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hier folgt der restliche Seiteninhalt -->

</body>

</html>
