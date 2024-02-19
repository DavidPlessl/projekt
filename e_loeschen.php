<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daten Löschen</title>
</head>

<body>

    <h2>Einsatzdaten löschen</h2>

    <?php

    if (isset($_GET['E_ID']) && isset($_GET['datum']) && isset($_GET['stichwort']) && isset($_GET['einsatzart']) && isset($_GET['fahrzeuge']) 
        && isset($_GET['weitere_kraefte']) && isset($_GET['beschreibung']) && isset($_GET['erstellt_von']) && isset($_GET['bestaetigt'])) {

        $e_id = $_GET['E_ID'];
        $datum = $_GET['datum'];
        $stichwort = $_GET['stichwort'];
        $einsatzart = $_GET['einsatzart'];
        $fahrzeuge = $_GET['fahrzeuge'];
        $weitere_kraefte = $_GET['weitere_kraefte'];
        $beschreibung = $_GET['beschreibung'];
        $erstellt_von = $_GET['erstellt_von'];
        $bestaetigt = $_GET['bestaetigt'];


    ?>

        <p>Soll folgender Einsatz wirklich gelöscht werden?</p>
        <p>
            <b>Stichwort:</b> <?php echo $stichwort; ?><br>
            <b>Datum:</b> <?php echo $datum; ?><br>
            <b>erstellt von:</b> <?php echo $erstellt_von; ?>
        </p>

        <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

            <label for="janein">Wollen Sie wirklich löschen?</label><br>
            <input type="radio" name="janein" value="Ja">Ja</input>
            <input type="radio" name="janein" value="Nein" checked>Nein</input><br>

            <input type="submit" name="submit" value="Löschen"></input>

            <input type="hidden" name="E_ID" value="<?php echo $e_id; ?>">
            <input type="hidden" name="datum" value="<?php echo $datum; ?>">
            <input type="hidden" name="stichwort" value="<?php echo $stichwort; ?>">
            <input type="hidden" name="einsatzart" value="<?php echo $einsatzart; ?>">
            <input type="hidden" name="fahrzeuge" value="<?php echo $fahrzeuge; ?>">
            <input type="hidden" name="weitere_kraefte" value="<?php echo $weitere_kraefte; ?>">
            <input type="hidden" name="beschreibung" value="<?php echo $beschreibung; ?>">
            <input type="hidden" name="ersellt_von" value="<?php echo $erstellt_von; ?>">
            <input type="hidden" name="bestaetigt" value="<?php echo $bestaetigt; ?>">

        </form>

    <?php

    } else if (isset($_POST['submit'])) {

        if (isset($_GET['E_ID']) && isset($_GET['datum']) && isset($_GET['stichwort']) && isset($_GET['einsatzart']) && isset($_GET['fahrzeuge']) 
        && isset($_GET['weitere_kraefte']) && isset($_GET['beschreibung']) && isset($_GET['erstellt_von']) && isset($_GET['bestaetigt'])) {

        $e_id = $_GET['E_ID'];
        $datum = $_GET['datum'];
        $stichwort = $_GET['stichwort'];
        $einsatzart = $_GET['einsatzart'];
        $fahrzeuge = $_GET['fahrzeuge'];
        $weitere_kraefte = $_GET['weitere_kraefte'];
        $beschreibung = $_GET['beschreibung'];
        $erstellt_von = $_GET['erstellt_von'];
        $bestaetigt = $_GET['bestaetigt'];


            if ($_POST['janein'] == 'Ja') {

                require_once('dbconnection.php');
                try {
                    
                    $statement = $pdo->prepare("DELETE FROM einsaetze WHERE E_ID=(:E_ID)");
                    $statement->bindParam(":E_ID", $e_id);
                    $statement->execute();

                    echo "Der Eintrag mit id: <b>$E_ID</b>, von <b>$stichwort</b> mit <b>$datum</b> Einsatz wurde gelöscht!<br><br>";
                    echo "<a link href='admin.php'>Zurück zur Admin-Seite</a>";

                } catch (PDOException $e) {
                    echo "Konnte nicht gelöscht werden!";
                }

            } else if($_POST['janein'] == 'Nein') {
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