<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>werde Mitglied!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
.p-4 {
    background-color: #ff0000;
    color: black;
    text-align: center;
    font-size: 24px;
    margin: 0;  
}
body {
    margin: 0;
}
h1 {
    margin-top: 0; 
}

form {
    margin-top: 20px;
    margin-left: 20px;
    margin-right: 500px;
}

.form-control {
    margin-bottom: 15px;
}

.navbar-form {
            display: flex;
            align-items: center;
}

 footer {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
      margin: 0px;
      margin-top: 0px;
      margin-bottom: 0px;
      margin-left: 0px;
      margin-right: 0px;
}

footer p {
  font-style: italic;
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

<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $nachricht = $_POST["nachricht"];

    $empfaenger = "santner.dominik1@hakspittal.at"; 
    $betreff = "Neue Formularnachricht von $name";
    $nachricht = "Name: $name\nE-Mail: $email\n\nNachricht:\n$nachricht";

    // E-Mail senden
    mail($empfaenger, $betreff, $nachricht);

    // Optional: Weiterleitung nach dem Versenden der E-Mail
    header("Location: danke.php");
    exit();
    } 

?>

<div class="p-4">
    <h1>Lust Mitglied zu werden?</h1><hr>
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
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Über uns</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="mitglieder.php">Mitglieder</a></li>
            <li><a class="dropdown-item" href="geraete.php">Ausrüstung</a></li>
            <li><a class="dropdown-item" href="statistik.php">Statistik</a></li>
        </ul>
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
</nav>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mb-5">
    <div class="mb-3">
        <label for="name">Ihr Name:</label><br>
        <input type="text" id="name" name="name" placeholder="Ihr Name" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="email">Ihre Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Ihre Email" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="nachricht">Was Sie uns Mitteilen möchten:</label><br>
        <textarea id="nachricht" name="nachricht" rows="4" cols="50" placeholder="Was möchten Sie uns mitteilen?" class="form-control" required></textarea>
    </div>

    <p>Durch den Klick auf "absenden" werden Ihre angegebenen Daten per E-Mail an unseren Kommandanten gesendet.</p>

    <input type="submit" value="absenden" name="senden" class="btn btn-primary"/><br>

    </form>

    <footer>

      <hr>
      <h2>Warum sollte ich zur Feuerwehr?</h2><br><br>
      <div class="row">
      <div class="col-lg">
      <img src="images/ffmann2.jpg" alt="unser Kommandant" width="200" height="200" style="border-radius: 50%;">
      </div>
      <div class="col-lg">
        <h3>Kommandant:</h3><br>
      <p>"Wir suchen engagierte Mitglieder, die gemeinsam mit uns Leben retten wollen. Dein Einsatz zählt – tritt bei und sei ein Teil unserer Feuerwehrfamilie!"</p>
      </div>
      <div class="col-lg">
        </div>
      <div class="col-lg">
      <h3>Zugskommandant:</h3><br>
      <p>"Sei ein Held in deiner Gemeinschaft. Werde Teil der Feuerwehr und mache einen echten Unterschied. Wir brauchen engagierte Menschen wie dich – tritt jetzt bei!"</p>
      </div>
      <div class="col-lg">
      <img src="images/ffmann1.jpg" alt="unser Zugskommandant" width="200" height="200" style="border-radius: 50%;">
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>