<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
</head>
<body>

    <?php
    
    if (isset($_POST['registrieren'])) {
        if (empty($_POST['vname']) || empty($_POST['nname']) || empty($_POST['email']) || empty($_POST['nummer']) || empty($_POST['passwort']) || empty($_POST['passwortwh'])) {
            echo "Bitte füllen Sie alle Felder!";
        } else {
            $vname = $_POST['vname'];
            $nname = $_POST['nname'];
            $email = $_POST['email'];
            $nummer = $_POST['nummer'];
            $passwort = $_POST['passwort'];
            $passwortwh = $_POST['passwortwh'];
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
                        echo "<i><b style='color: red'>Ihre gewünschte Feuerwehr-Nummer ". $nummer . " existiert bereits!<br> Bitte geben Sie eine andere Nummer ein!</b></i>";
                    } else {

                        $statement = $pdo->prepare("INSERT INTO mitglieder (vorname, nachname, email, fw_nr, passwort) VALUES (:vname, :nname, :email, :nummer, :passwort)");

                        $statement->bindParam(':vname', $vname);
                        $statement->bindParam(':nname', $nname);
                        $statement->bindParam(':email', $email);
                        $statement->bindParam(':nummer', $nummer);
                        $statement->bindParam(':passwort', $passwort_hash);

                        $statement->execute();
                        echo "Registrierung erfolgreich!";

                        $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/anmelden.php';
                        header('Location: ' . $pfad);
                        
                    }

                } catch (PDOException $e) {
                    die("Registrierung fehlgeschlagen!");
                }

            }

        }

    }else if (isset($_POST['zurueck'])) {

        //weiterleiten
        $pfad1 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/startseite.php';
        header('Location: ' . $pfad1);
    }

    ?>
    
    <h1>Registrieren</h1>

    <p>Bitte füllen Sie folgende Felder aus, um Ihren Account zu erstellen!<br>
    Sollten Sie schon einen Account haben, hier <a href="anmelden.php">anmelden</a>.</p>

    <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

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

            <label for="passwort">Passwort:</label>
            <input type="password" name="passwort" id="passwort" placeholder="min. 4 Zeichen"><br><br>

            <label for="passwortwh">Passwort (Wiederholt):</label>
            <input type="password" name="passwortwh" id="passwortwh" placeholder="min. 4 Zeichen"><br>
    </fieldset> 
    
        <br>
        <input type="submit" value="Registrieren" name="registrieren">       
        <input type="submit" value="Zurück zur Startseite" name="zurueck" />
    </form>

</body>
</html>