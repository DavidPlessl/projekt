<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitäten melden</title>
</head>
<body>

<?php

    if (isset($_POST['melden'])) {

        if (empty($_POST['datum']) || empty($_POST['aktivitaet']) || empty($_POST['ort']) || empty($_POST['beschreibung']) || empty($_POST['erstellt_von'])) {

            echo "<h3> Bitte füllen Sie alle Felder des Formulars aus!</h3>";

        } else {

            $datum = $_POST['datum'];
            $aktivitaet = $_POST['aktivitaet'];
            $ort = $_POST['ort'];
            $beschreibung = $_POST['beschreibung'];
            $erstellt_von = $_POST['erstellt_von'];

            require_once('dbconnection.php');

            try {
            
                $statement = $pdo->prepare("INSERT INTO aktivitaeten (datum, aktivitaet, ort, beschreibung, erstellt_von) VALUES (:datum, :aktivitaet, :ort, :beschreibung, :erstellt_von)");

                $statement->bindParam(':datum', $datum);
                $statement->bindParam(':aktivitaet', $aktivitaet);
                $statement->bindParam(':ort', $ort);
                $statement->bindParam(':beschreibung', $beschreibung);
                $statement->bindParam(':erstellt_von', $erstellt_von);

                $statement->execute();   

                echo"<h3>Vielen Dank, die Aktivität wurde gemeldet und muss jetzt nur noch freigegeben werden!</h3>";

            } catch(PDOException $ex) {
                die("Ihre Aktivitaet konnte nicht in die Datenbank eingefügt werden!");
            }

        }

    } else if (isset($_POST['zurueck'])) {

        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
        header('Location: ' . $pfad);

    } else {

?>

<h1>Hier können sie eine Aktivität melden:</h1>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <fieldset>
    <legend>Daten:</legend>

    <label for="datum">Datum:</label>
    <input type="date" id="datum" name="datum"  /><br>

    <br><label for="aktivitaet">Aktivität:</label>
    <input type="text" id="aktivitaet" name="aktivitaet" /><br>

    <br><label for="ort">Ort:</label>
    <input type="text" id="ort" name="ort" /><br><br>

    <br><label for="beschreibung">Beschreibung:</label>
    <textarea id="beschreibung" name="beschreibung" ></textarea><br>

    <br><label for="erstellt_von">Erstellt von:</label>
    <input type="text" id="erstellt_von" name="erstellt_von"/><br><br>

    <input type="submit" value="melden" name="melden" />
    <input type="submit" value="zurück" name="zurueck" />
    </fieldset>
</form>
<?php
}
?>    

</body>
</html>