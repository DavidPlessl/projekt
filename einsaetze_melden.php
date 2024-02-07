<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einsätze melden</title>
</head>
<body>

<?php

    if(isset($_POST['melden'])) {

        if(empty($_POST['datum']) || empty($_POST['stichwort']) || empty($_POST['einsatzart']) || empty($_POST['einsatzort']) || empty($_POST['fahrzeuge']) || empty($_POST['weitere_kraefte']) || empty($_POST['beschreibung']) || empty($_POST['erstellt_von'])) {

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

                try{
                
                    $statement = $pdo->prepare("INSERT INTO einsaetze (datum, stichwort, einsatzart, einsatzort, fahrzeuge, weitere_kraefte, beschreibung, erstellt_von) VALUES (:datum, :stichwort, :einsatzart, :einsatzort, :fahrzeuge, :weitere_kraefte, :beschreibung, :erstellt_von)");

                    $statement->bindParam(':datum', $datum);
                    $statement->bindParam(':stichwort', $stichwort);
                    $statement->bindParam(':einsatzart', $einsatzart);
                    $statement->bindParam(':einsatzort', $einsatzort);
                    $statement->bindParam(':fahrzeuge', $fahrzeuge);
                    $statement->bindParam(':weitere_kraefte', $weitere_kraefte);
                    $statement->bindParam(':beschreibung', $beschreibung);
                    $statement->bindParam(':erstellt_von', $erstellt_von);

                    $statement->execute();   

                    echo"<h3>Vielen Dank, der Einsatz wurde gemeldet und muss jetzt nur noch freigegeben werden!</h3>";

                } catch(PDOException $ex) {
                    die("Ihr Einsatz konnte nicht in die Datenbank eingefügt werden!");
                }

            }

        }

else if (isset($_POST['zurueck'])) {

    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
    header('Location: ' . $pfad);
    
} else {

?>

<h1>Hier können sie einen Einsatz melden:</h1>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <fieldset>
    <legend>Daten:</legend>

    <label for="datum">Datum:</label>
    <input type="date" id="datum" name="datum"  /><br>

    <br><label for="stichwort">Stichwort:</label>
    <input type="text" id="stichwort" name="stichwort" /><br>

    <br><label for="einsatzart">Einsatzart:</label>
    <input type="text" id="einsatzart" name="einsatzart" /><br>

    <br><label for="einsatzort">Einsatzort:</label>
    <input type="text" id="einsatzort" name="einsatzort" /><br><br>

    <label for="fahrzeuge">Fahrzeuge:</label><br><br>
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

    <br><label for="kreafte">Weitere Kräfte:</label>
    <input type="text" id="weitere_kreafte" name="weitere_kraefte"/><br>

    <br><label for="beschreibung">Beschreibung:</label>
    <textarea id="beschreibung" name="beschreibung" ></textarea><br>

    <br><label for="erstellt_von">Erstellt von:</label>
    <input type="text" id="erstellt_von" name="erstellt_von"/><br><br>

    <input type="submit" value="melden" name="melden" />
    <input type="submit" value="zurück" name="zurueck" />
    </fieldset>

<?php
}
?>

</body>
</html>