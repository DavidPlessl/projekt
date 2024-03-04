<!DOCTYPE html>
<html lang="en">
<head>
  <title>Startseite</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0; 
      font-family: 'Arial', sans-serif;
    }

    header {
      position: relative;
      width: 100%;
      overflow: hidden;
      text-align: center;
      color: white;

    }

    header img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
    }

    .header-content {
      position: relative;
      z-index: 1;
      padding-top: 0vh; /* Platz für den Text im Vordergrund */
    }

    .header-content h2 {
      font-size: 3em;
      margin-bottom: 20px;
    }

    .controls {
      z-index: 1;
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
      font-size: 3em;
      color: white;
      cursor: pointer;
    }

    #prev { margin-left: 20px; }
    #next { margin-right: 20px; }

    .p-4 {
      background-color: #ff0000;
      color: black;
      text-align: center;
      font-size: 24px;
    }

    table {
      width: 90%;
      margin: auto;
      border-collapse: collapse;
      margin-bottom: 20px;
      margin-top: 20px;
    }

    th {
      text-align: center;
      background-color: #c6e2ff;
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

    #slideshow {
      position: relative;
      width: 100%;
      height: 89vh;
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

    .rechts {
      text-align: right !important;
    }

    h3 {
      text-align: center;
    }

    .navbar-form {
      display: flex;
      align-items: center;
    }

    .search-input {
      margin-right: 10px; 
    }

    .container {
     max-width: 1200px; /* Angepasster Wert für die maximale Breite der Seite */
     margin: 0 auto; /* Zentriere den Seiteninhalt */
}

  </style>
</head>

<body>
  <header>
    <div id="slideshow">
      <div class="slide" style="background-image: url('images/Slide1.jpg');">
        <div class="header-content">
          <h2>Herzlich Willkommen auf der Startseite der Freiwilligen Feuerwehr St. Schmorrel</h2>
        </div>
      </div>
      <div class="slide" style="background-image: url('images/Slide2.jpg');">
        <div class="header-content">
          <h2>Herzlich Willkommen auf der Startseite der Freiwilligen Feuerwehr St. Schmorrel</h2>
        </div>
      </div>
      <div class="slide" style="background-image: url('images/slide5.jpg');">
        <div class="header-content">
          <h2>Herzlich Willkommen auf der Startseite der Freiwilligen Feuerwehr St. Schmorrel</h2>
        </div>
      </div>
    </div>
    <div class="controls">
      <button id="prev" onclick="prevSlide()">&#10094;</button>
      <button id="next" onclick="nextSlide()">&#10095;</button>
    </div>
  </header>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="aktivitaeten.php">zu den Aktivitäten</a>
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

      <!-- Suchfeld mit Lupe -->
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

  <div class="p-4">
    <h3>Hier finden Sie unsere letzten Einsätze:</h3>
    <hr>
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

    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = (i === index) ? 'block' : 'none';
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    }

    function startSlideshow() {
      setInterval(() => {
        nextSlide();
      }, 5000); // (hier: 5 Sekunden)
    }

    window.onload = function() {
      startSlideshow();
    };

    showSlide(currentSlide);
  </script>
</body>
</html>