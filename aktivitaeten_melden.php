<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einsätze melden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php

    if (isset($_POST['melden'])) {

        if (empty($_POST['datum']) || empty($_POST['aktivitaet']) || empty($_POST['ort']) || empty($_POST['erstellt_von'])) {

                echo"<h3> Bitte füllen Sie alle Felder des Formulars aus!</h3>";

        } else {

            $datum = $_POST['datum'];
            $aktivitaet = $_POST['aktivitaet'];
            $ort = $_POST['ort'];
            $beschreibung = $_POST['beschreibung'];
            $erstellt_von = $_POST['erstellt_von'];

            require_once('dbconnection.php');


            try{
                
                $statement = $pdo->prepare("INSERT INTO aktivitaeten (datum, aktivitaet, ort, beschreibung, erstellt_von) VALUES (:datum, :aktivitaet, :ort, :beschreibung, :erstellt_von)");

                $statement->bindParam(':datum', $datum);
                $statement->bindParam(':aktivitaet', $aktivitaet);
                $statement->bindParam(':ort', $ort);
                $statement->bindParam(':beschreibung', $beschreibung);
                $statement->bindParam(':erstellt_von', $erstellt_von);

                $statement->execute();   

                echo"<h3>Vielen Dank, die Aktivität wurde gemeldet und muss jetzt nur noch freigegeben werden!</h3>"; 
                echo "Hier kommen Sie <a href='startseite.php'>zurück zur Startseite</a>";

            } catch(PDOException $ex) {
                die("Ihre Aktivität konnte nicht in die Datenbank eingefügt werden!");
            }

        }

    } else if (isset($_POST['zurueck'])) {

        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
        header('Location: ' . $pfad);
    
    } else {

?>

<div class="container mt-5">
            <h1 class="mb-4">Hier können Sie eine Aktivität erstellen:</h1>

            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" class="mb-5">
                <fieldset>
                    <legend class="mb-3">Daten:</legend>

                    <div class="mb-3">
                        <label for="datum" class="form-label">Datum:</label>
                        <input type="date" id="datum" name="datum" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label">Aktivität:</label>
                        <input type="text" id="aktivitaet" name="aktivitaet" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label">Ort:</label>
                        <input type="text" id="ort" name="ort" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label">Beschreibung:</label>
                        <input type="text" id="beschreibung" name="beschreibung" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="erstellt_von" class="form-label">Erstellt von:</label>
                        <input type="text" id="erstellt_von" name="erstellt_von" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Melden" name="melden" class="btn btn-primary" />
                        <input type="submit" value="Zurück" name="zurueck" class="btn btn-secondary" />
                    </div>

                </fieldset>
            </form>
        </div>

    <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>