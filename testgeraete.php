<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitglieder anzeigen</title>
    <style>
        body {
            text-align: center;
            margin-bottom: 70px; /* Füge einen unteren Abstand ein, um Platz für den Footer zu schaffen */
        }

        .mitglied-container {
            max-width: 300px;
            margin: auto;
            margin-top: 30px;
            display: flex;
            flex-direction: column; /* Ändere die Anordnung auf Spaltenrichtung */
            align-items: center; /* Zentriere die Elemente horizontal */
            text-align: center;
        }

        .mitglied-container img {
            max-width: 100%;
            max-height: 250px; /* Setze die maximale Höhe für die Bilder */
            border-radius: 20px;
            margin-bottom: 10px; /* Füge einen Abstand zwischen den Bildern hinzu */
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

        .mitglied-container h3,
        .mitglied-container p {
            text-align: center;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    try {
        require_once('dbconnection.php');

        $stmt = $pdo->query("SELECT name1, baujahr, funktion, bild FROM geraete");
        $mitglieder = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Datenbankfehler: " . $e->getMessage());
    }

    ?>

    <div class="hintergrund p-4">
        <h2>Hier finden Sie einige unserer Mitglieder</h2>
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
                <li class="nav-item">
                    <a class="nav-link active" href="geraete.php">Ausrüstung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="werde_mitglied.php">werde Mitglied!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="anmelden.php">Anmelden</a>
                </li>
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
                    <input type="text" class="form-control" placeholder="Suche..." aria-label="Search"
                        id="searchInput">
                </div>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <?php foreach ($mitglieder as $mitglied) : ?>
                <div class="mitglied-container col-lg-4 mb-4">
                    <h3><?php echo $mitglied['name1']; ?></h3>
                    <p><?php echo $mitglied['baujahr']; ?></p>
                    <p><?php echo $mitglied['funktion']; ?></p>
                    <img src="<?php echo $mitglied['bild']; ?>" alt="Gerätebild" class="mb-3">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <form method="POST" action="anmelden.php">
            <hr>
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
                        style="border-radius: 10px; overflow: hidden; display: inline-block;">
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
            var containers = document.querySelectorAll('.mitglied-container');
            containers.forEach(function (container) {
                var shouldShow = Array.from(container.children).some(function (element) {
                    return element.textContent.toLowerCase().includes(searchValue);
                });
                container.style.display = shouldShow ? '' : 'none';
            });
        });
    </script>

</body>

</html>
