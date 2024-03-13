<!DOCTYPE html>
<html lang="en">
<title>Menü</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            height: 100vh;
            background-image: url("../projekt/images/hintergrund1.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        .navbar {
            text-align: center;
            position: fixed;
            width: 100%;
            z-index: 1000;
            background-color: #343a40; 
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff; 
        }

        .navbar-toggler-icon {
            background-color: #fff; 
        }

        .navbar-toggler {
            border-color: #fff; /
        }

        .navbar-toggler:hover,
        .navbar-toggler:focus {
            background-color: #fff; 
        }

        h2 {
            text-align: center;
            background-color: #343a40; 
            color: #fff; 
            padding: 20px;
            margin-bottom: 0px;
        }
    </style>
  
</head>

<body>
    <header>
        <div>
            <h2>Herzlich Willkommen im Menü!</h2>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
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
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Admin</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</body>

</html>
