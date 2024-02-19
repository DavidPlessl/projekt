<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten Löschen</title>
</head>

<body>

    <h2>Aktivitäten löschen</h2>

    <?php

    if (isset($_GET['A_ID']) && isset($_GET['datum']) && isset($_GET['aktivitaet']) && isset($_GET['ort']) && isset($_GET['beschreibung']) 
        && isset($_GET['erstellt_von'])) {

        $a_id = $_GET['A_ID'];
        $datum = $_GET['datum'];
        $aktivitaet = $_GET['aktivitaet'];
        $ort = $_GET['ort'];
        $beschreibung = $_GET['beschreibung'];
        $erstellt_von = $_GET['erstellt_von'];


    ?>

        <p>Soll folgende Aktivität wirklich gelöscht werden?</p>
        <p>
            <b>Aktivität:</b> <?php echo $aktivitaet; ?><br>
            <b>Datum:</b> <?php echo $datum; ?><br>
            <b>erstellt von:</b> <?php echo $erstellt_von; ?>
        </p>

        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <label for="janein">Wollen Sie wirklich löschen?</label><br>
            <input type="radio" name="janein" value="Ja">Ja</input>
            <input type="radio" name="janein" value="Nein" checked>Nein</input><br>

            <input type="submit" name="submit" value="Löschen"></input>

            <input type="hidden" name="A_ID" value="<?php echo $A_ID; ?>">
            <input type="hidden" name="datum" value="<?php echo $datum; ?>">
            <input type="hidden" name="aktivitaet" value="<?php echo $aktivitaet; ?>">
            <input type="hidden" name="ort" value="<?php echo $ort; ?>">
            <input type="hidden" name="beschreibung" value="<?php echo $beschreibung; ?>">
            <input type="hidden" name="ersellt_von" value="<?php echo $erstellt_von; ?>">

        </form>

    <?php

    } else if (isset($_POST['submit'])) {

        if (isset($_POST['A_ID']) && isset($_POST['datum']) && isset($_POST['aktivitaet']) && isset($_POST['ort']) && isset($_POST['beschreibung']) 
        && isset($_POST['erstellt_von'])) {

        $a_id = $_POST['A_ID'];
        $datum = $_POST['datum'];
        $aktivitaet = $_POST['aktivitaet'];
        $ort = $_POST['ort'];
        $beschreibung = $_POST['beschreibung'];
        $erstellt_von = $_POST['erstellt_von'];


            if ($_POST['janein'] == 'Ja') {

                require_once('dbconnection.php');


                try {
                    $statement = $pdo->prepare("DELETE FROM aktivitaeten WHERE A_ID=:A_ID");
                    $statement->bindParam(":A_ID", $a_id);
                    $statement->execute();

                    echo "Der Eintrag mit id: <b>$a_id</b>, von <b>$aktivitaet</b> mit <b>$datum</b> Aktivität wurde gelöscht!<br><br>";
                    echo "<a link href='admin.php'>Zurück zur Admin-Seite</a>";

                } catch (PDOException $e) {
                    echo "Konnte nicht gelöscht werden!";
                }

            } else {
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