<!DOCTYPE html>
<html lang="en">
<head>
  <title>t</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-family: 'Arial', sans-serif;
    }

    header {
      position: relative;
      width: 100%;
      height: 100vh;
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
      padding-top: 20vh; /* Platz für den Text im Vordergrund */
    }

    .header-content h2 {
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
  </style>
</head>

<body>
  <header>
    <div id="slideshow">
      <div class="slide" style="background-image: url('autos.jpg');">
        <div class="header-content">
          <h2>Herzlich Willkommen auf der Startseite der Freiwilligen Feuerwehr St. Schmorrel</h2>
        </div>
      </div>
      <div class="slide" style="background-image: url('slide2.jpg');">
        <div class="header-content">
          <h2>Zweiter Slide</h2>
          <h2>Herzlich Willkommen auf der Startseite der Freiwilligen Feuerwehr St. Schmorrel</h2>
        </div>
      </div>
      <div class="slide" style="background-image: url('slide3.jpg');">
    </div>
    <div class="controls">
      <button id="prev" onclick="prevSlide()">&#10094;</button>
      <button id="next" onclick="nextSlide()">&#10095;</button>
    </div>
  </header>

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

 <!--  <h2>Hier finden sie die letzten und noch bevorstehenden Ereignisse:</h2><hr> -->

<?php
  ?>

  <footer>
    <form method="POST" action="anmelden.php">
      <hr>
      <p>Falls Sie Mitglied sind und sich anmelden wollen, dann klicken Sie hier:</p>
      <input type="submit" value="Anmelden" name="anmelden" />
    </form>
  </footer>

  <script>
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

    showSlide(currentSlide);
  </script>
</body>
</html>