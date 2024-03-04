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
   <h2>Hier finden sie die letzten und noch bevorstehenden Ereignisse:</h2><hr>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="startseite.php">zurück zur Startseite </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="mitglieder.php">Mitglieder</a>
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
    <form class="navbar-form">
        <div class="input-group search-input">
          <span class="input-group-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a7.5 7.5 0 1 0-1.397 1.397h0a7.5 7.5 0 0 0 1.397-1.397zM13 7.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </span>
          <input type="text" class="form-control" placeholder="Suche..." aria-label="Search" id="searchInput">
        </div>
      </form>
    </div>
</nav>

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

<script>
document.getElementById('searchInput').addEventListener('input', function () {
   var searchValue = this.value.toLowerCase();
   var rows = document.querySelectorAll('table tr');
   rows.forEach(function (row) {
     var shouldShow = Array.from(row.children).some(function (cell) {
       return cell.textContent.toLowerCase().includes(searchValue);
     });
     row.style.display = shouldShow ? '' : 'none';
   });
 });
</script>

</body>
</html>