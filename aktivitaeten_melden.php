<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einsätze melden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .alert {
            margin: 10px;
        }
    </style> 

</head>
<body class="bg-light">

<?php

    if (isset($_POST['melden'])) {

        if (empty($_POST['datum']) || empty($_POST['aktivitaet']) || empty($_POST['ort']) || empty($_POST['erstellt_von'])) {

            ?>
            <div class="alert alert-danger">
                    <strong>Achtung!</strong> Bitte füllen Sie alle Felder des Formulars aus!<br><br>
                    Hier kommen Sie <a href='einsaetze_melden.php'>zurück zur Eingabe
            </div>
        <?php 
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

                ?>
                <div class="alert alert-success">
                        <strong>Vielen Dank!</strong> Die Aktivität wurde erfolgreich gemeldet und muss jetzt nur noch freigegeben werden!<br><br>
                        Hier kommen Sie <a href='menue.php'>zurück zum Menü
                </div>
            <?php 

            } catch(PDOException $ex) {
                die("Ihre Aktivität konnte nicht in die Datenbank eingefügt werden!");
            }

        }

    } else if (isset($_POST['menue'])) {

        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
        header('Location: ' . $pfad);
    
    } else if (isset($_POST['startseite'])) {
        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/startseite.php';
        header('Location: ' . $pfad);
    } else {

?>

<div class="container mt-5">
            <h1 class="mb-4">Hier können Sie eine Aktivität erstellen:</h1>


            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" class="mb-5">
                <fieldset>
                    <legend class="mb-3"><b>Daten der Aktivität:</b></legend>

                    <div class="mb-3">
                        <label for="datum" class="form-label"><b>Datum:</b></label>
                        <input type="date" id="datum" name="datum" class="form-control"  />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label"><b>Aktivität:</b></label>
                        <input type="text" id="aktivitaet" name="aktivitaet" placeholder="zB. Übung" class="form-control"  />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label"><b>Ort:</b></label>
                        <input type="text" id="ort" name="ort" placeholder="zB. 9800 Spittal, Bahnhofstraße 1" class="form-control"  />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label"><b>Beschreibung:</b></label>
                        <input type="text" id="beschreibung" name="beschreibung" placeholder="..." class="form-control"  />
                    </div>

                    <div class="mb-3">
                        <label for="erstellt_von" class="form-label"><b>Erstellt von:</b></label>
                        <input type="text" id="erstellt_von" name="erstellt_von" placeholder="dein Name" class="form-control"  />
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Melden" name="melden" class="btn btn-primary" />
                        <input type="submit" value="Startseite" name="startseite" class="btn btn-secondary" />
                        <input type="submit" value="Menü" name="menue" class="btn btn-danger" />
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