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

    <h2>Mitglied löschen</h2>

    <?php

    if (isset($_GET['M_ID']) && isset($_GET['vorname']) && isset($_GET['nachname']) && isset($_GET['email']) && isset($_GET['fw_nr']) && isset($_GET['passwort']) && isset($_GET['dienstgrad']) && isset($_GET['bild_pfad'])) {

        $m_id = $_GET['M_ID'];
        $vorname = $_GET['vorname'];
        $nachname = $_GET['nachname'];
        $email = $_GET['email'];
        $fw_nr = $_GET['fw_nr'];
        $passwort = $_GET['passwort'];
        $dienstgrad = $_GET['dienstgrad'];
        $bild_pfad = $_GET['bild_pfad'];

        echo "<h4>Sie haben folgendes Mitglied ausgewählt:</h4>";

        echo "<b>Name:</b> " . $vorname . $nachname . "<br>" .
            "<b>Feuerwehr-Nummer:</b> " . $fw_nr . "<br>" .
            "<b>Email:</b> " . $email . "<br><br>" . 
            "Wollen Sie folgenden Eintrag wirklich löschen?<br>";

    ?>

        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <input type="radio" name="janein" value="Ja">Ja</input>
            <input type="radio" name="janein" value="Nein" checked>Nein</input><br>

            <input type="submit" name="submit" value="Löschen"></input>

            <input type="hidden" name="M_ID" value="<?php echo $m_id; ?>">
            <input type="hidden" name="bild_pfad" value="<?php echo $bild_pfad; ?>">

        </form>

    <?php

    } else if (isset($_POST['submit']) && isset($_POST['bild_pfad'])) {

        if (isset($_POST['M_ID'])) {

        $m_id = $_POST['M_ID'];
        $bild_pfad = $_POST['bild_pfad'];

            if ($_POST['janein'] == "Ja") {

                require_once('appKonstanten.php');
                $dateipfad = GW_IMAGEPFAD . $bild_pfad;
                //echo $dateipfad;
                if (file_exists($dateipfad)){
                    if(unlink($dateipfad)){
                        echo "Das Foto wurde erfolgreich gelöscht.";
                    }
                }

                require_once('dbconnection.php');

                try {
                    $statement = $pdo->prepare("DELETE FROM mitglieder WHERE M_ID=:M_ID");
                    $statement->bindParam(":M_ID", $m_id);
                    $statement->execute();

                    echo "Der Eintrag mit der ID: <b>$m_id</b> wurde erfolgreich gelöscht!<br><br>";
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