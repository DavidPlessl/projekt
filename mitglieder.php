<!DOCTYPE html>
<html lang="en">
<head>
  <title>Startseite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .bg-primary {
    background-color: #ff0000 !important;
        }

    .black-text {
            color: black;
        }

        table {
            width: 90%; /* Anpassen der Breite der Tabelle nach Bedarf */
            margin: auto; /* Automatisches Zentrieren der Tabelle */
            border-collapse: collapse; /* Zusammenführen von Zellengrenzen */
            margin-bottom: 20px; /* abstand unten*/
            margin-top: 20px; /*abstan oben*/
        }

        th {
            text-align: center; /* Zentrieren des Texts in den Überschriftenzellen */
            background-color: #c6e2ff; /* Hintergrundfarbe für Überschriftenzellen */
            padding: 10px; /* Hinzufügen von Padding für bessere Lesbarkeit */
        }

        td {
            /* Stil für Datenzellen hier anpassen, falls erforderlich */
            padding: 10px;
            border: 3px solid #ddd;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        
        .navbar-form {
            display: flex;
            align-items: center;
        }

  </style>
</head>
<body>
<div class="p-4 bg-primary black-text text-center">
   <h2>Hier finden sie einige unserer Mitglieder</h2><hr>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="startseite.php">zurück zur Startseite </a>
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
    </div>
</nav>

    <?php

    require_once('dbconnection.php');

try {
    $statement = $pdo->prepare("SELECT * FROM mitglieder");

    $statement->execute();

    echo "<table>";

    if ($statement->rowCount() > 0) {
        while ($zeile = $statement->fetch()) {
                echo "<tr>" .
                    //Funktion (Kommandant) noch hinzufügen zur DB, melden Datei und hier
                    "<th>FW-Nummer</th>" . "<th>Vorname</th>" . "<th>Nachname</th>" . "<th>E-Mail</th>" .
                    "</tr>" . 
                    "<tr style='text-align:center'>" .
                    "<td>" . $zeile['fw_nr'] . "</td>" .
                    "<td>" . $zeile['vorname'] . "</td>" .
                    "<td>" . $zeile['nachname'] . "</td>".
                    "<td>" . $zeile['email'] . "</td>" .
                    "</tr>";
        }
    }

    echo "</table>";
} catch (PDOException $ex) {
    die("Fehler beim Ausgeben der Daten in die Datenbank!");
}

?>

<footer>
    <form method="POST" action="anmelden.php">
      <hr>
      <h2>Hier finden Sie uns auf Social Media</h2><br>

      <div class="row">
      <div class="col-lg">
      <a href="https://www.instagram.com/ihre_instagram_seite" target="_blank">
      <img src="images/instagram.jpg" alt="Instagram-Logo" width="50" height="50" style="border-radius: 50%;">
      </a><br><br>
      <p>Instagram</p>
      </div>

      <div class="col-lg">
      <a href="https://www.flickr.com/photos/IhrFlickrAccount" target="_blank" style="border-radius: 10px; overflow: hidden; display: inline-block;">
      <img src="images/flickr.jpeg" alt="Flickr-Logo" width="50" height="50" style="border-radius: 50%;">
      </a><br><br>
      <p>Flickr</p>
      </div>

      <div class="col-lg">
      <a href="https://www.facebook.com/IhreFacebookSeite" target="_blank" style="border-radius: 10px; overflow: hidden; display: inline-block;">
      <img src="images/facebook.jpeg" alt="Facebook-Logo" width="50" height="50" style="border-radius: 50%;">
      </a><br><br>
      <p>Facebook</p>
      </div>
      </div>

    </form>
  </footer>

</body>
</html>