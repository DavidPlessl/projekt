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

<h2>Hier sind einige genauere Informationen zu Ihrer gewünschten Aktivität:</h2><hr>

<?php

if (isset($_GET['A_ID']) && isset($_GET['datum']) && isset($_GET['aktivitaet']) && isset($_GET['ort']) && isset($_GET['beschreibung'])) {

    $A_ID = $_GET['A_ID'];
    $datum = $_GET['datum'];
    $aktivitaet = $_GET['aktivitaet'];
    $ort = $_GET['ort'];
    $beschreibung = $_GET['beschreibung'];

    echo "<b>Datum:</b> " . $datum . "<br><br>" .
         "<b>Aktivität:</b> " . $aktivitaet . "<br><br>" .
         "<b>Ort:</b> " . $ort . "<br><br>" .
         "<b>Beschreibung:</b> " . $beschreibung . "<br>";
}

         if (isset($_POST['zurueck'])) {

            $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/aktivitaeten.php';
            header('Location: ' . $pfad);
        }
?>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
<input type="submit" name="zurueck" value="Zurück">
</form>

</body>
</html>