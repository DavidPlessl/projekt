<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beschreibung Einsätze</title>
</head>
<body>

<h3>Hier sind einige genauere Informationen zu Ihrem gewünschten Einsatz:</h3><hr>

<?php

if (isset($_GET['E_ID']) && isset($_GET['datum']) && isset($_GET['stichwort']) && isset($_GET['einsatzart']) && isset($_GET['einsatzort']) && isset($_GET['fahrzeuge']) && isset($_GET['weitere_kraefte']) && isset($_GET['beschreibung'])) {

    $E_ID = $_GET['E_ID'];
    $datum = $_GET['datum'];
    $stichwort = $_GET['stichwort'];
    $einsatzart = $_GET['einsatzart'];
    $einsatzort = $_GET['einsatzort'];
    $fahrzeuge = $_GET['fahrzeuge'];
    $weitere_kraefte = $_GET['weitere_kraefte'];
    $beschreibung = $_GET['beschreibung'];

    echo "Einsatz-Nummer: " . $E_ID . "<br>" .
         "Datum: " . $datum . "<br>" .
         "Stichwort: " . $stichwort . "<br>" .
         "Einsatzart: " . $einsatzart . "<br>" .
         "Einsatzort: " . $einsatzort . "<br>" .
         "Fahrzeuge: " . $fahrzeuge . "<br>" .
         "Weitere Kräfte: " . $weitere_kraefte . "<br>" .
         "Beschreibung: " . $beschreibung . "<br>";

?>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
<input type="submit" name="zurueck" value="Zurück">
</form>

<?php
}
?>

</body>
</html>