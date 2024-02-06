<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitäten melden</title>
</head>
<body>

<?php
if (isset($_POST['zurueck'])) {

    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
    header('Location: ' . $pfad);
}
?>

<h1>Hier können sie eine Aktivität melden:</h1>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <fieldset>
    <legend>Daten:</legend>

    <label for="datum">Datum:</label>
    <input type="date" id="datum" name="datum"  /><br>

    <br><label for="aktiviteat">Aktivität:</label>
    <input type="text" id="aktiviteat" name="aktiviteat" /><br>

    <br><label for="ort">Einsatzort:</label>
    <input type="text" id="ort" name="ort" /><br><br>

    <br><label for="beschreibung">Beschreibung:</label>
    <textarea id="beschreibung" name="beschreibung" ></textarea><br><br>

    <input type="submit" value="melden" name="melden" />
    <input type="submit" value="zurück" name="zurueck" />
    </fieldset>


    
</body>
</html>