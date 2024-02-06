<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einsätze melden</title>
</head>
<body>
<?php
if (isset($_POST['zurueck'])) {

    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
    header('Location: ' . $pfad);
}
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
    <td><input type="checkbox" name="kdof" value="kdof" />KDOF</option></td>
    <td><input type="checkbox" name="tlfa4000_1" value="tlfa4000_1" />TLFA 4000/1</option></td>
    <td><input type="checkbox" name="tlfa4000_2" value="tlfa4000_2" />TLFA 4000/2</option></td>
    </tr><tr>
    <td><input type="checkbox" name="dlk30" value="dlk30" />DLK 30</option></td>
    <td><input type="checkbox" name="klf" value="klf" />KLF</option></td>
    <td><input type="checkbox" name="srfk" value="srfk" />SRF-K</option></td>
    </tr><tr>
    <td><input type="checkbox" name="lfb" value="lfb" />LFB</option></td>
    <td><input type="checkbox" name="rlf" value="rlf" />RLF</option></td>
    <td><input type="checkbox" name="mzfa" value="mzfa" />MZFA</option></td>
    </tr>
    <td><input type="checkbox" name="mtf" value="mtf" />MTF</option></td>
    <td><input type="checkbox" name="asf" value="asf" />ASF</option></td>
    <td><input type="checkbox" name="boot" value="boot" />Boot</option></td>
    </tr>
    </table>

    <br><label for="kreafte">Weitere Kräfte:</label>
    <input type="text" id="kreafte" name="kreafte"/><br>

    <br><label for="beschreibung">Beschreibung:</label>
    <textarea id="beschreibung" name="beschreibung" ></textarea><br><br>

    <input type="submit" value="melden" name="melden" />
    <input type="submit" value="zurück" name="zurueck" />
    </fieldset>

</body>
</html>