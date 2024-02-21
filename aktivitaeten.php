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
  </style>
</head>
<body>
<div class="p-4 bg-primary black-text text-center">
   <h2>Hier finden sie die letzten und noch bevorstehenden Ereignisse:</h2><hr>
</div>
    <?php

    require_once('dbconnection.php');

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
}


?>

</body>
</html>