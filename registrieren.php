<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['registrieren'])) {
    if (empty($_POST['vname']) || empty($_POST['nname']) || empty($_POST['email']) || empty($_POST['nummer']) || empty($_POST['passwort']) || empty($_POST['passwortwh']) || empty($_POST['dienstgrad'])) {
        echo "Bitte füllen Sie alle Felder!";
    } else {
        $vname = $_POST['vname'];
        $nname = $_POST['nname'];
        $email = $_POST['email'];
        $nummer = $_POST['nummer'];
        $passwort = $_POST['passwort'];
        $passwortwh = $_POST['passwortwh'];
        $dienstgrad = $_POST['dienstgrad'];
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        if ($passwort != $passwortwh) {
            echo "Die Passwörter stimmen nicht überein!";
        } else {

            try {
                require_once('dbconnection.php');

                $stmt = $pdo->prepare("SELECT fw_nr FROM mitglieder WHERE fw_nr = :fw_nr");

                $stmt->bindParam(':fw_nr', $nummer);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<i><b style='color: red'>Ihre gewünschte Feuerwehr-Nummer " . $nummer . " existiert bereits!<br> Bitte geben Sie eine andere Nummer ein!</b></i>";
                } else {

                    // Bildverarbeitung
                    if (isset($_FILES['bild']) && $_FILES['bild']['error'] === UPLOAD_ERR_OK) {
                        $uploadDirectory = "uploads/";
                        $uploadedFile = $_FILES['bild'];
                        $fileName = $uploadedFile['name'];
                        $tempFilePath = $uploadedFile['tmp_name'];
                        $newFileName = uniqid('', true) . '_' . $fileName;
                        $uploadPath = $uploadDirectory . $newFileName;

                        if (move_uploaded_file($tempFilePath, $uploadPath)) {
                            $statement = $pdo->prepare("INSERT INTO mitglieder (vorname, nachname, email, fw_nr, passwort, bild_pfad, dienstgrad) VALUES (:vname, :nname, :email, :nummer, :passwort, :bild_pfad, :dienstgrad)");

                            $statement->bindParam(':vname', $vname);
                            $statement->bindParam(':nname', $nname);
                            $statement->bindParam(':email', $email);
                            $statement->bindParam(':nummer', $nummer);
                            $statement->bindParam(':passwort', $passwort_hash);
                            $statement->bindParam(':bild_pfad', $uploadPath);
                            $statement->bindParam(':dienstgrad', $dienstgrad);

                            $statement->execute();
                            echo "Registrierung erfolgreich!";

                            $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/anmelden.php';
                            header('Location: ' . $pfad);
                        } else {
                            echo "Fehler beim Hochladen des Bildes.";
                        }
                    } else {
                        echo "<h3>Bitte wählen Sie ein Bild aus.</h3>";
                    }
                }
            } catch (PDOException $e) {
                die("Registrierung fehlgeschlagen! Datenbankfehler: " . $e->getMessage());
            }
        }
    }
} else if (isset($_POST['zurueck'])) {

    //weiterleiten
    $pfad1 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/startseite.php';
    header('Location: ' . $pfad1);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style_registrieren.css">
</head>

<body>

    <div class="login">
        <h1>Registrieren</h1>

        <p>Bitte füllen Sie folgende Felder aus, um Ihren Account zu erstellen!<br>
            Sollten Sie schon einen Account haben, hier <a href="anmelden.php">anmelden</a>.</p>

        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" enctype="multipart/form-data">

            <fieldset>
                <legend>Anmeldedaten</legend>
                <label for="vname">Vorname:</label>
                <input type="text" name="vname" id="vname" placeholder="Max"><br><br>

                <label for="nname">Nachname:</label>
                <input type="text" name="nname" id="nname" placeholder="Musterman"><br><br>

                <label for="email">E-Mail:</label>
                <input type="email" name="email" id="email" placeholder="musterman@gmx.at"><br><br>

                <label for="nummer">FW-Nummer:</label>
                <input type="number" name="nummer" id="nummer" placeholder="z. B. 25"><br><br>

                <label for="dienstgrad">Dienstgrad:</label>
                <input type="text" name="dienstgrad" id="dienstgrad" placeholder="z. B. Hauptfeuerwehrmann"><br><br>

                <label for="passwort">Passwort:</label>
                <input type="password" name="passwort" id="passwort" placeholder="min. 3 Zeichen"><br><br>

                <label for="passwortwh">Passwort (Wiederholt):</label>
                <input type="password" name="passwortwh" id="passwortwh" placeholder="min. 3 Zeichen"><br>

                <label for="bild">Bild hochladen:</label>
                <input type="file" name="bild" id="bild"><br>
            </fieldset>

            <br>
            <input type="submit" value="Registrieren" name="registrieren">
            <input type="submit" value="Zurück zur Startseite" name="zurueck" />
        </form>
    </div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">

</body>

</html>
