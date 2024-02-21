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
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        #slideshow {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .slide {
            display: none;
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
            background-size: cover;
            color: white;
            padding-top: 20vh; /* Platz für den Text im Vordergrund */
            box-sizing: border-box;
        }

        .slide h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .controls button {
            background: none;
            border: none;
            font-size: 1.5em;
            color: white;
            cursor: pointer;
        }

        #prev { margin-left: 20px; }
        #next { margin-right: 20px; }
  </style>
</head>
<body>
    <div class="p-4 bg-primary black-text text-center">
    <h1>Herzlich Willkommen auf der Satrtseite der Freiwilligen Feuerwehr St. Schmorrel</h1><hr>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="aktivitaeten.php">zu den Aktivitäten</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Mitglied</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Ausrüstung</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="">werde Mitglied!</a>
      </li>
    </ul>
  </div>
</nav>

<div class="p-4 bg-primary black-text text-center">
<h3>Hier finden sie unsere letzten Einsätze:</h3><hr>
</div>

    <?php

    require_once('dbconnection.php');

    try {
        $statement = $pdo->prepare("SELECT * FROM einsaetze");

        $statement->execute();

        echo "<table>";

        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                if ($zeile['bestaetigt'] == 1) {
             
                    echo "<tr>" .
                        "<th>Datum</th>" . "<th>Stichwort</th>" . "<th>Einsatzart</th>" . 
                        "<th>Einsatzort</th>" . "<th>weitere Details</th>" . 
                    
                        "</tr>" . 
                        "<tr style='text-align:center'>" .
                        "<td>" . $zeile['datum'] . "</td>" .
                        "<td>" . $zeile['stichwort'] . "</td>" .
                        "<td>" . $zeile['einsatzart'] . "</td>" .
                        "<td>" . $zeile['einsatzort'] . "</td>" .

                        "<td>" . "<a href='genaue_beschreibung_einsaetze.php?E_ID=$zeile[E_ID]&datum=$zeile[datum]&stichwort=$zeile[stichwort]&einsatzart=$zeile[einsatzart]&einsatzort=$zeile[einsatzort]&fahrzeuge=$zeile[fahrzeuge]&weitere_kraefte=$zeile[weitere_kraefte]&beschreibung=$zeile[beschreibung]'>Genauere Beschreibung</a>" . "</td>" .
                        "</tr>";

                }
            }
        }

        echo "</table>";
    } catch (PDOException $ex) {
        die("Fehler beim Ausgeben der Daten in die Datenbank!");
    }

    ?>

  <!--  <h2>Hier finden sie die letzten und noch bevorstehenden Ereignisse:</h2><hr> -->

<?php
/*
try {
    $statement = $pdo->prepare("SELECT * FROM aktivitaeten");

    $statement->execute();

    echo "<table>";

    if ($statement->rowCount() > 0) {
        while ($zeile = $statement->fetch()) {
            if ($zeile['bestaetigt'] == 1) {
                echo "<tr>" .
                    "<th>Datum</th>" . "<th>Aktivität</th>" . "<th>Ort</th>" . "<th>weitere Details</th>" .
                    "</tr>" . 
                    "<tr style='text-align:center'>" .
                    "<td>" . $zeile['datum'] . "</td>" .
                    "<td>" . $zeile['aktivitaet'] . "</td>" .
                    "<td>" . $zeile['ort'] . "</td>".
                    "<td>" . "<a href='genaue_beschreibung_aktivitaeten.php?A_ID=$zeile[A_ID]&datum=$zeile[datum]&aktivitaet=$zeile[aktivitaet]&ort=$zeile[ort]&beschreibung=$zeile[beschreibung]'>Genauere Beschreibung</a>" . "</td>" .
                    "</tr>";
            }
        }
    }

    echo "</table>";
} catch (PDOException $ex) {
    die("Fehler beim Ausgeben der Daten in die Datenbank!");
} */

    /*if (isset($_POST['anmelden'])) {

        //weiterleiten zum Anmelden-Skript
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/anmelden.php';
        echo $pfad;
        header('Location: ' . 'anmelden.php');

    }*/

?>
<footer>
<form method="POST" action="anmelden.php">
    <hr>
    <p>Falls Sie Mitglied sind und sich anmelden wollen, dann klicken Sie hier:</p>
    <input type="submit" value="Anmelden" name="anmelden" />
    </form>
</footer>
</body>
</html>