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

        if (empty($_POST['datum']) || empty($_POST['stichwort']) || empty($_POST['einsatzart']) || empty($_POST['einsatzort']) || empty($_POST['fahrzeuge']) || empty($_POST['weitere_kraefte']) || empty($_POST['beschreibung']) || empty($_POST['erstellt_von'])) {

                echo"<h3> Bitte füllen Sie alle Felder des Formulars aus!</h3>";

        } else {

            $datum = $_POST['datum'];
            $stichwort = $_POST['stichwort'];
            $einsatzart = $_POST['einsatzart'];
            $einsatzort = $_POST['einsatzort'];
            $fahrzeuge = $_POST['fahrzeuge'];
            $weitere_kraefte = $_POST['weitere_kraefte'];
            $beschreibung = $_POST['beschreibung'];
            $erstellt_von = $_POST['erstellt_von'];

            require_once('dbconnection.php');

            if(isset($_POST['fahrzeuge'])) {
                $string_fahrzeuge = implode('; ', $fahrzeuge);
            } else {
                $string_fahrzeuge = "";
            }

            try{
                
                $statement = $pdo->prepare("INSERT INTO einsaetze (datum, stichwort, einsatzart, einsatzort, fahrzeuge, weitere_kraefte, beschreibung, erstellt_von) VALUES (:datum, :stichwort, :einsatzart, :einsatzort, :fahrzeuge, :weitere_kraefte, :beschreibung, :erstellt_von)");

                $statement->bindParam(':datum', $datum);
                $statement->bindParam(':stichwort', $stichwort);
                $statement->bindParam(':einsatzart', $einsatzart);
                $statement->bindParam(':einsatzort', $einsatzort);
                $statement->bindParam(':fahrzeuge', $string_fahrzeuge);

                $statement->bindParam(':weitere_kraefte', $weitere_kraefte);
                $statement->bindParam(':beschreibung', $beschreibung);
                $statement->bindParam(':erstellt_von', $erstellt_von);

                $statement->execute();   

                echo"<h3>Vielen Dank, der Einsatz wurde gemeldet und muss jetzt nur noch freigegeben werden!</h3>"; 

            } catch(PDOException $ex) {
                die("Ihr Einsatz konnte nicht in die Datenbank eingefügt werden!");
            }

        }

    } else if (isset($_POST['zurueck'])) {

        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
        header('Location: ' . $pfad);
    
    } else {

?>

<div class="container mt-5">
            <h1 class="mb-4">Hier können Sie einen Einsatz melden:</h1>

            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" class="mb-5">
                <fieldset>
                    <legend class="mb-3">Daten:</legend>

                    <div class="mb-3">
                        <label for="datum" class="form-label">Datum:</label>
                        <input type="date" id="datum" name="datum" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label">Stichwort:</label>
                        <input type="text" id="stichwort" name="stichwort" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label">Einsatzart:</label>
                        <input type="text" id="einsatzart" name="einsatzart" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="stichwort" class="form-label">Einsatzort:</label>
                        <input type="text" id="einsatzort" name="einsatzort" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="erstellt_von" class="form-label">Erstellt von:</label>
                        <input type="text" id="erstellt_von" name="erstellt_von" class="form-control" required />
                    </div>

                    <div class="mb-3">
                        <label for="fahrzeuge" class="form-label">Fahrzeuge:</label><br>
                        <table>
                    <tr>
                        <td><input type="checkbox" name="fahrzeuge[]" value="kdof" />KDOF</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="tlfa4000_1" />TLFA 4000/1</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="tlfa4000_2" />TLFA 4000/2</option></td>
                    </tr><tr>
                        <td><input type="checkbox" name="fahrzeuge[]" value="dlk30" />DLK 30</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="klf" />KLF</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="srfk" />SRF-K</option></td>
                    </tr><tr>
                        <td><input type="checkbox" name="fahrzeuge[]" value="lfb" />LFB</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="rlf" />RLF</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="mzfa" />MZFA</option></td>
                    </tr>
                        <td><input type="checkbox" name="fahrzeuge[]" value="mtf" />MTF</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="asf" />ASF</option></td>
                        <td><input type="checkbox" name="fahrzeuge[]" value="boot" />Boot</option></td>
    </tr>
    </table>
                    </div>

                    <div class="mb-3">
                        <label for="weitere_kraefte" class="form-label">Weitere Kräfte:</label>
                        <input type="text" id="weitere_kraefte" name="weitere_kraefte" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="beschreibung" class="form-label">Beschreibung:</label>
                        <textarea id="beschreibung" name="beschreibung" class="form-control" required></textarea>
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