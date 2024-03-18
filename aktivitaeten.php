<?php
session_start();
?>

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
            width: 90%; /*Breite der Tabelle  */
            margin: auto; 
            border-collapse: collapse; /* Zusammenführen von Zellengrenzen */
            margin-bottom: 20px; 
            margin-top: 20px; 
        }

        th {
            text-align: center;
            background-color: #5c83b9; 
            padding: 10px; 
        }

        td {
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
            margin-right: 10px;
            margin-left: 5px !important;
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

    footer p {
      font-weight: bold;
    }

    footer h2 {
      font-weight: bold;
    }

    .navbar-form .form-control {
    width: 230px !important; 
    }

  </style>
</head>
<body>
<div class="p-4 bg-primary black-text text-center">
   <h2>Hier finden sie die letzten und noch bevorstehenden Ereignisse:</h2><hr>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container"> 
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="startseite.php">zurück zur Startseite </a>
        </li>
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Über uns</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
           <li><a class="dropdown-item" href="mitglieder.php">Mitglieder</a></li>
           <li><a class="dropdown-item" href="geraete.php">Ausrüstung</a></li>
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
        </li>
      </ul>
    </div>
    <form class="navbar-form ms-auto">
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