<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten Bestätigen</title>
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

    <h3>Einsatzdaten bestätigen</h3>

    <?php

    if (isset($_GET['E_ID']) && isset($_GET['datum']) && isset($_GET['stichwort']) 
        && isset($_GET['einsatzart']) && isset($_GET['einsatzort']) && isset($_GET['fahrzeuge'])
        && isset($_GET['weitere_kraefte']) && isset($_GET['beschreibung']) && isset($_GET['erstellt_von'])
        && isset($_GET['bestaetigt'])) {

        $e_id = $_GET['E_ID'];
        $datum = $_GET['datum'];
        $stichwort = $_GET['stichwort'];
        $einsatzart = $_GET['einsatzart'];
        $einsatzort = $_GET['einsatzort'];
        $fahrzeuge = $_GET['fahrzeuge'];
        $weitere_kraefte = $_GET['weitere_kraefte'];
        $beschreibung = $_GET['beschreibung'];
        $erstellt_von = $_GET['erstellt_von'];
        $bestaetigt = $_GET['bestaetigt'];

        echo "<h4>Sie haben folgenden Einsatz ausgewählt:</h4>";

        echo "<b>Stichwort:</b> " . $stichwort . "<br>" .
            "<b>Datum:</b> " . $datum . "<br>" .
            "<b>Erstellt von:</b> " . $erstellt_von . "<br><br>" . 
            "Wollen Sie folgenden Eintrag wirklich bestätigen?<br>";
    ?>

        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <input type="radio" name="janein" value="Ja">Ja
            <input type="radio" name="janein" value="Nein" checked>Nein<br>

            <input type="submit" name="submit" value="Senden">

            <input type="hidden" name="E_ID" value="<?php echo $e_id; ?>">
        </form>

    <?php
    } else if (isset($_POST['submit'])) {

        if (isset($_POST['E_ID'])) {
  
        $e_id = $_POST['E_ID'];

            if ($_POST['janein'] == "Ja") {

                require_once('dbconnection.php');

                try {

                    $statement = $pdo->prepare("UPDATE einsaetze SET bestaetigt=1 WHERE E_ID=:E_ID");
                    $statement->bindParam(":E_ID", $e_id);
                    $statement->execute();

                    echo "Der Eintrag mit der ID: <b>$e_id</b> wurde erfolgreich bestätigt!<br><br>";
                    echo "<a link href='admin.php'>Zurück zur Admin-Seite</a>";

                } catch (PDOException $e) {
                    echo "Konnte nicht bestätigt werden!";
                }    

            } else if ($_POST['janein'] == "Nein") {
                echo "Der Vorgang wurde abgebrochen!<br><br>";
                echo "<a link href='admin.php'>Zurück zur Admin-Seite</a>";
            }

        }

    } else {

        echo "Bitte wählen Sie zuerst einen Datensatz aus! ";
        echo "<a href='admin.php'>Zurück zur Admin-Seite</a>";
    }

    ?>

</body>
</html>