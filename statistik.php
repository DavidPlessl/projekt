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
    body {
      margin: 0;
      padding: 0; 
      font-family: 'Arial', sans-serif;
    }

.header-content h2 {
  position: relative;
  font-size: 3em;
  margin-bottom: 20px;
  margin-top: 0px;
  color: white; 
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

    footer {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
    }

    .rechts {
      text-align: right !important;
    }

    h3 {
      text-align: center;
    }

    .container {
     max-width: 1200px; 
     margin: 0 auto; 
    }
    .navbar-nav .nav-link {
        color: white; 
    }
    .navbar-nav .dropdown-menu .dropdown-item {
        color: black; 
    }

    .navbar-nav .dropdown-menu .dropdown-item:hover {
        background-color: #343a40; 
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<div class="p-4">
    <h3>Hier finden Sie einige Statistiken:</h3>
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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Über uns</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="mitglieder.php">Mitglieder</a></li>
            <li><a class="dropdown-item" href="geraete.php">Ausrüstung</a></li>
        </ul>
    </li>
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
        echo "</li>";
    }
    ?>
</ul>
</div>
</nav>

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
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>