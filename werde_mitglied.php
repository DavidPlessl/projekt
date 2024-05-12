<?php
session_start();
?>

<?php
$lang = $_GET["lang"]; // GET Variable setzen
if($lang == "")
 { 
  $lang = "de"; // Wenn die Variable $lang leer aufgerufen wird, lassen wir uns eine Sprache vor definieren! ( In meinem Beispiel verwende ich Deutsch ) 
 }
include("lang_".$lang.".php"); // Includieren der lang_de.php, Wenn $lang Variable leer ist!
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
      header("Location: werde_Mitglied_Ausgabe.php");
    exit();
    } 

?>

<div class="p-4">

  <h1><?php echo $title ?></h1><hr>
  
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="startseite.php"><?php echo $zrueck ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="aktivitaeten.php"><?php echo $aktivitaeten ?></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $ueberuns ?></a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="mitglieder.php"><?php echo $mitglieder ?></a></li>
            <li><a class="dropdown-item" href="geraete.php"><?php echo $ausruestung ?></a></li>
            <li><a class="dropdown-item" href="statistik.php"><?php echo $statistik ?></a></li>
        </ul>
    <?php
      if (isset($_SESSION['nummer'])) {
          echo "<li class='nav-item'>";
          echo "<a class='nav-link active' href='menue.php'>$menue</a>";
          echo "</li>";
          
          echo "<li class='nav-item'>";
          echo "<a class='nav-link active' href='abmelden.php'>$abmelden</a>";
          echo "</li>";
      } else {
          echo "<li class='nav-item'>";
          echo "<a class='nav-link active' href='anmelden.php'>$anmelden</a>";
      }
    ?>

        </li>
      </ul>
    </div>
</nav>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mb-5">
    
<a href="?lang=de">Deutsch</a>  |  <a href="?lang=en">Englisch</a><br><br>

<div class="mb-3">
        <label for="name"><?php echo $name1 ?></label><br>
        <input type="text" id="name" name="name" placeholder="Max Mustermann" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="email"><?php echo $email ?></label><br>
        <input type="email" id="email" name="email" placeholder="mustermann@gmx.net" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="nachricht"><?php echo $nachricht ?></label><br>
        <textarea id="nachricht" name="nachricht" rows="4" cols="50" placeholder="..." class="form-control" required></textarea>
    </div>

    <p><?php echo $text ?></p>

    <input type="submit" value="<?php echo $absenden ?>" name="senden" class="btn btn-primary"/><br>

    </form>

    <footer>

      <hr>
      <h2><?php echo $warum ?></h2><br><br>
      <div class="row">
      <div class="col-lg">
      <img src="images/ffmann2.jpg" alt="unser Kommandant" width="200" height="200" style="border-radius: 50%;">
      </div>
      <div class="col-lg">
        <h3>Kommandant:</h3><br>
      <p><?php echo $text1 ?></p>
      </div>
      <div class="col-lg">
        </div>
      <div class="col-lg">
      <h3>Zugskommandant:</h3><br>
      <p><?php echo $text2 ?></p>
      </div>
      <div class="col-lg">
      <img src="images/ffmann1.jpg" alt="unser Zugskommandant" width="200" height="200" style="border-radius: 50%;">
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>