<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beschreibung Einsätze</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style> 
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h2 {
    color: #333;
}

form {
    margin-top: 20px;
}

input[type="radio"] {
    margin-right: 10px;
}

input[type="submit"] {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>

<h2>Hier sind einige genauere Informationen zu Ihrem gewünschten Einsatz:</h2><hr>

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

    echo "<b>Datum:</b> " . $datum . "<br><br>" .
         "<b>Stichwort:</b> " . $stichwort . "<br><br>" .
         "<b>Einsatzart:</b> " . $einsatzart . "<br><br>" .
         "<b>Einsatzort:</b> " . $einsatzort . "<br><br>" .
         "<b>Fahrzeuge:</b> " . $fahrzeuge . "<br><br>" .
         "<b>Weitere Kräfte:</b> " . $weitere_kraefte . "<br><br>" .
         "<b>Beschreibung:</b> " . $beschreibung . "<br>";
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