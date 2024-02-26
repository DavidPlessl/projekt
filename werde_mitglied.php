<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>werde Mitglied!</title>
</head>
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
    header("Location: danke.html");
    exit();
}
?>

<h1>Lust Mitglied zu werden?</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <label for="name">Ihr Name:</label><br><br>
    <input type="text" id="name" name="name" placeholder="Ihr Name" required><br><br>

    <label for="email">Ihre Email:</label><br><br>
    <input type="email" id="email" name="email" placeholder="Ihre Email" required/><br><br>

    <label for="nachricht">Was Sie uns Mitteilen möchten:</label><br><br>
    <textarea id="nachricht" name="nachricht" rows="4" cols="50" placeholder="Was möchten Sie uns Mitteilen?" required></textarea><br><br>

    <p>Durch den Klick auf "Senden" werden Ihre Daten an unseren Kommandanten per E-Mail gesendet.</p>

    <input type="submit" value="absenden" name="senden" />

</form>

</body>
</html>