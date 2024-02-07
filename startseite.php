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
                        "<th>Datum</th>" . "<th>Stichwort</th>" . "<th>Einsatzart</th>" . 
                        "<th>Einsatzort</th>" . 
                        "</tr>" . 
                        "<tr style='text-align:center'>" .
                        "<td>" . $zeile['datum'] . "</td>" .
                        "<td>" . $zeile['stichwort'] . "</td>" .
                        "<td>" . $zeile['einsatzart'] . "</td>" .
                        "<td>" . $zeile['einsatzort'] . "</td>" .

                        "<td>" . "<a href='genaue_beschreibung_einsaetze.php?E_ID=$zeile[E_ID]&datum=$zeile[datum]&stichwort=$zeile[stichwort]&einsatzart=$zeile[einsatzart]&einsatzort=$zeile[einsatzort]&fahrzeuge=$zeile[fahrzeuge]&weitere_kraefte=$zeile[weitere_kraefte]&beschreibung=$zeile[beschreibung]'>Genauere Beschreibung</a>" . "</td>" .
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
                    "<th>Datum</th>" . "<th>Aktivität</th>" . "<th>Ort</th>" . 
                    "</tr>" . 
                    "<tr style='text-align:center'>" .
                    "<td>" . $zeile['datum'] . "</td>" .
                    "<td>" . $zeile['aktivitaet'] . "</td>" .
                    "<td>" . $zeile['ort'] . "</td>" .
                    "<td>" . "<a href='genaue_beschreibung_aktivitaeten.php?A_ID=$zeile[A_ID]&datum=$zeile[datum]&aktivitaet=$zeile[aktivitaet]&ort=$zeile[ort]&beschreibung=$zeile[beschreibung]'>Genauere Beschreibung</a>" . "</td>" .
                    "</tr>";
            }
        }
    }

    echo "</table>";
} catch (PDOException $ex) {
    die("Fehler beim Ausgeben der Daten in die Datenbank!");
}


    /*if (isset($_POST['anmelden'])) {

        //weiterleiten zum Anmelden-Skript
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/anmelden.php';
        echo $pfad;
        header('Location: ' . 'anmelden.php');

    }*/

?>

<form method="POST" action="anmelden.php">
    <hr>
    <p>Fals sie Mitglied sind und sich anmelden wollen, dan klicken sie hier:</p>
    <input type="submit" value="Anmelden" name="anmelden" />
    </form>
    
</body>
</html>