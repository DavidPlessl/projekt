<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startseite</title>
</head>
<body>
    <h1>Herzlich Willkommen auf der Satrtseite der Freiwilligen Feuerwehr St. Schmorrel</h1><hr>

    <h2>Hier finden sie unsere letzten Einsätze:</h2><hr>

    <?php

    require_once('dbconnection.php');

    try {
        $statement = $pdo->prepare("SELECT * FROM einsaetze");

        $statement->execute();

        echo "<table>";

        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                if ($zeile['bestaetigt'] == 1) {
                    echo "<tr>" .
                        "<th>Einsatz-Nr.</th>" . "<th>Datum</th>" . "<th>Stichwort</th>" . "<th>Einsatzart</th>" . 
                        "<th>Einsatzort</th>" . "<th>Fahrzeuge</th>" . "<th>Weitere Kräfte</th>" .
                        "<th>Erstellt von</th>" . 
                        "</tr>" . 
                        "<tr style='text-align:center'>" .
                        "<td>" . $zeile['E_ID'] . "</td>" .
                        "<td>" . $zeile['datum'] . "</td>" .
                        "<td>" . $zeile['stichwort'] . "</td>" .
                        "<td>" . $zeile['einsatzart'] . "</td>" .
                        "<td>" . $zeile['einsatzort'] . "</td>" .
                        "<td>" . $zeile['fahrzeuge'] . "</td>" .
                        "<td>" . $zeile['weitere_kraefte'] . "</td>" .
                        "<td>" . $zeile['erstellt_von'] . "</td>" .
                        "</tr>";
                }
            }
        }

        echo "</table>";
    } catch (PDOException $ex) {
        die("Fehler beim Ausgeben der Daten in die Datenbank!");
    }

    ?>

    <h2>Hier finden sie die letzten und noch bevorstehenden Ereignisse:</h2><hr>

    <?php

try {
    $statement = $pdo->prepare("SELECT * FROM aktivitaeten");

    $statement->execute();

    echo "<table>";

    if ($statement->rowCount() > 0) {
        while ($zeile = $statement->fetch()) {
            if ($zeile['bestaetigt'] == 1) {
                echo "<tr>" .
                    "<th>Aktivitäten-Nr.</th>" . "<th>Datum</th>" . "<th>Aktivität</th>" . "<th>Ort</th>" . 
                    "<th>Erstellt von</th>" .
                    "</tr>" . 
                    "<tr style='text-align:center'>" .
                    "<td>" . $zeile['A_ID'] . "</td>" .
                    "<td>" . $zeile['datum'] . "</td>" .
                    "<td>" . $zeile['aktivitaet'] . "</td>" .
                    "<td>" . $zeile['ort'] . "</td>" .
                    "<td>" . $zeile['erstellt_von'] . "</td>" .
                    "</tr>";
            }
        }
    }

    echo "</table>";
} catch (PDOException $ex) {
    die("Fehler beim Ausgeben der Daten in die Datenbank!");
}


    if (isset($_POST['anmelden'])) {

        //weiterleiten zum Anmelden-Skript
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/anmelden.php';
        header('Location: ' . $pfad);

    }

?>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <hr>
    <!--<input type="submit" value="ansehen" name="ansehen" /><br><hr>  -->
    <p> Fals sie Mitglied sind und sich anmelden wollen, dan klicken sie hier:</p>
        <input type="submit" value="anmelden" name="anmelden" />
    </form>
    
</body>
</html>