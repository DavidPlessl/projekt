<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten Löschen</title>
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

    <h2>Aktivität löschen</h2>

    <?php

    if (isset($_GET['A_ID']) && isset($_GET['datum']) && isset($_GET['aktivitaet']) && isset($_GET['ort']) && isset($_GET['beschreibung']) && isset($_GET['erstellt_von']) && isset($_GET['bestaetigt'])) {

        $a_id = $_GET['A_ID'];
        $datum = $_GET['datum'];
        $aktivitaet = $_GET['aktivitaet'];
        $ort = $_GET['ort'];
        $beschreibung = $_GET['beschreibung'];
        $erstellt_von = $_GET['erstellt_von'];
        $bestaetigt = $_GET['bestaetigt'];

        echo "<h4>Sie haben folgende Aktivität ausgewählt:</h4>";

        echo "<b>Aktivität:</b> " . $aktivitaet . "<br>" .
            "<b>Datum:</b> " . $datum . "<br>" .
            "<b>Erstellt von:</b> " . $erstellt_von . "<br><br>" . 
            "Wollen Sie folgenden Eintrag wirklich löschen?<br>";

    ?>

        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <input type="radio" name="janein" value="Ja">Ja</input>
            <input type="radio" name="janein" value="Nein" checked>Nein</input><br>

            <input type="submit" name="submit" value="Löschen"></input>

            <input type="hidden" name="A_ID" value="<?php echo $a_id; ?>">

        </form>

    <?php

    } else if (isset($_POST['submit'])) {

        if (isset($_POST['A_ID'])) {

        $a_id = $_POST['A_ID'];

            if ($_POST['janein'] == "Ja") {

                require_once('dbconnection.php');

                try {
                    $statement = $pdo->prepare("DELETE FROM aktivitaeten WHERE A_ID=:A_ID");
                    $statement->bindParam(":A_ID", $a_id);
                    $statement->execute();

                    echo "Der Eintrag mit der ID: <b>$a_id</b> wurde erfolgreich gelöscht!<br><br>";
                    echo "<a link href='admin.php'>Zurück zur Admin-Seite</a>";

                } catch (PDOException $e) {
                    echo "Konnte nicht gelöscht werden!";
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