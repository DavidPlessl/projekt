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
        <textarea id="nachricht" name="nachricht" rows="4" cols="50" placeholder="Was möchten Sie uns Mitteilen?" class="form-control" required></textarea>
    </div>

    <p>Durch den Klick auf "Senden" werden Ihre Daten an unseren Kommandanten per E-Mail gesendet.</p>

    <input type="submit" value="absenden" name="senden" class="btn btn-primary"/>
</form>

</body>
</html>