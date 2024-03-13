<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ausrüstung</title>
    <style>
        body {
            text-align: center;
            margin-bottom: 70px; /* Füge einen unteren Abstand ein, um Platz für den Footer zu schaffen */
        }

        .geraete-container {
            max-width: 300px;
            margin: auto;
            margin-top: 30px;
            text-align: center;
        }

        .geraete-container img {
            max-width: 100%;
            max-height: 250px; 
            border-radius: 20px;
            margin-bottom: 10px;
            border: 5px solid #333; 
        }
        footer p {
            font-weight: bold;
        }

        footer h2 {
            font-weight: bold;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: relative; /* Ändere die Position auf "relative" */
            width: 100%;
            bottom: 0;
        }

        .navbar-form {
            display: flex;
            align-items: center;
            margin-right: 2px;
        }

        .hintergrund {
            background-color: red;
            color: black;
            padding: 20px;
            text-align: center;
        }

        .geraete-container h3, .geraete-container p {
            text-align: center;
        }

        .navbar-nav .nav-link {
            color: white; 
        }

        .navbar-nav .dropdown-menu .dropdown-item {
            color: black; 
        }

        .navbar-nav .dropdown-menu .dropdown-item:hover {
            background-color: #DCDCDC; 
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    try {
        require_once('dbconnection.php');

        $stmt = $pdo->query("SELECT name1, baujahr, funktion, bild FROM geraete");
        $geraete = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Datenbankfehler: " . $e->getMessage());
    }

    ?>

    <div class="hintergrund p-4">
        <h2>Hier finden Sie einige unserer Fahrzeuge</h2>
        <hr>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="startseite.php">zurück zur Startseite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="aktivitaeten.php">Aktivitäten</a>
                </li>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Über uns</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="mitglieder.php">Mitglieder</a></li>
                    <li><a class="dropdown-item" href="statistik.php">Statistik</a></li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link active" href="werde_mitglied.php">werde Mitglied!</a>
                </li>
                 <?php

                if (isset($_SESSION['nummer'])) {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link active' href='menue.php'>Menü</a>";
                    echo "</li>";
                
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link active' href='abmelden.php'>Abmelden</a>";
                    echo "</li>";
                } else {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link active' href='anmelden.php'>Anmelden</a>";
                }
                ?>
            </ul>
            <form class="navbar-form">
                <div class="input-group search-input">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a7.5 7.5 0 1 0-1.397 1.397h0a7.5 7.5 0 0 0 1.397-1.397zM13 7.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Suche..." aria-label="Search" id="searchInput">
                </div>
            </form>
        </div>
    </nav>

    <div class="container">
        <?php foreach ($geraete as $geraet) : ?>
            <div class="geraete-container mb-4">
                <img src="<?php echo $geraet['bild']; ?>" alt="Gerätebild" class="mb-3">
                <h3><?php echo $geraet['name1']; ?></h3>
                <p><?php echo $geraet['baujahr']; ?></p>
                <p><?php echo $geraet['funktion']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <form method="POST" action="anmelden.php">
            <hr></hr>
            <h2>Hier finden Sie uns auf Social Media</h2><br>

            <div class="row">
                <div class="col-lg">
                    <a href="https://www.instagram.com/ihre_instagram_seite" target="_blank">
                        <img src="images/instagram.jpg" alt="Instagram-Logo" width="50" height="50"
                            style="border-radius: 50%;">
                    </a><br><br>
                    <p>Instagram</p>
                </div>

                <div class="col-lg">
                    <a href="https://www.flickr.com/photos/IhrFlickrAccount" target="_blank"
                        style="border-radius: 10px; overflow: hidden; display: inline-block;">
                        <img src="images/flickr.jpeg" alt="Flickr-Logo" width="50" height="50"
                            style="border-radius: 50%;">
                    </a><br><br>
                    <p>Flickr</p>
                </div>

                <div class="col-lg">
                    <a href="https://www.facebook.com/IhreFacebookSeite" target="_blank"
                        style="border-radius: 10px; overflow:
 hidden; display: inline-block;">
                        <img src="images/facebook.jpeg" alt="Facebook-Logo" width="50" height="50"
                            style="border-radius: 50%;">
                    </a><br><br>
                    <p>Facebook</p>
                </div>
            </div>
        </form>
    </footer>

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            var searchValue = this.value.toLowerCase();
            var containers = document.querySelectorAll('.geraete-container');
            containers.forEach(function (container) {
                var shouldShow = Array.from(container.children).some(function (element) {
                    return element.textContent.toLowerCase().includes(searchValue);
                });
                container.style.display = shouldShow ? '' : 'none';
            });
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
