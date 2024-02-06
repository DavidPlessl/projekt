<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beschreibung Einsätze</title>
</head>
<body>

<h3>Hier sind einige genauere Informationen zu Ihrer gewünschten Aktivität:</h3><hr>

<?php

if (isset($_GET['A_ID']) && isset($_GET['datum']) && isset($_GET['aktivitaet']) && isset($_GET['ort']) && isset($_GET['beschreibung'])) {

    $A_ID = $_GET['A_ID'];
    $datum = $_GET['datum'];
    $aktivitaet = $_GET['aktivitaet'];
    $ort = $_GET['ort'];
    $beschreibung = $_GET['beschreibung'];

    echo "Aktivitäts-Nummer: " . $A_ID . "<br><br>" .
         "Datum: " . $datum . "<br><br>" .
         "Aktivität: " . $aktivitaet . "<br><br>" .
         "ort: " . $ort . "<br><br>" .
         "Beschreibung: " . $beschreibung . "<br><br>";
}

         if (isset($_POST['zurueck'])) {

            $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/startseite.php';
            header('Location: ' . $pfad);
        }
?>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
<input type="submit" name="zurueck" value="Zurück">
</form>

</body>
</html>