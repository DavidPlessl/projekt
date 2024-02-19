<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
</head>
<body>
   
    <?php
    
    if (isset($_POST['anmelden1'])) {
        if (empty($_POST['nummer']) || empty($_POST['passwort'])) {
            echo "Bitte füllen Sie zuerst alle Felder aus!";
        } else {
            $nummer = htmlspecialchars(trim($_POST['nummer']));
            $passwort = trim($_POST['passwort']);

            require_once("dbconnection.php");

            try {
                $statement = $pdo->prepare("SELECT M_ID, vorname, nachname, email, fw_nr, passwort FROM mitglieder WHERE fw_nr = :fw_nr");
                $statement->bindParam(":fw_nr", $nummer);
                $statement->execute();
            } catch (PDOException $e) {
                die("Login nicht möglich!");
            }

            if ($statement->rowCount() > 0) {

                $row = $statement->fetch();
                $id = $row['M_ID'];
                $vorname = $row['vorname'];
                $nachname = $row['nachname'];
                $email = $row['email'];
                $fw_nummer = $row['fw_nr'];
                $gespeichertesPWD = $row['passwort'];

                if (password_verify($passwort, $gespeichertesPWD)) {

                    if (password_needs_rehash($gespeichertesPWD, PASSWORD_DEFAULT)) {

                        $neuesPWD = password_hash($passwort, PASSWORD_DEFAULT);

                        try {
                            $statement = $pdo->prepare("UPDATE mitglieder SET passwort = :passwort WHERE fw_nr = :fw_nr");

                            $statement->bindParam(':passwort', $neuesPWD);
                            $statement->bindParam(':fw_nr', $nummer);
                            $statement->execute();

                        } catch (PDOException $e) {
                            die("Es ist ein Fehler beim Speichern des neuen Hashwertes aufgetreten!");
                        }
                        echo "<h3>Die Daten (Passwort) wurden aktualisiert!</h3>";


                    }

                    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
                    header('Location: ' . $pfad);

                } else {
                    echo "Bitte überprüfen Sie Ihr Passwort!";
                    $formular_anzeigen = true;
                }

            }

        }    

    }    

    ?>

    <h1>Anmelden</h1>

    <p>Bitte füllen Sie folgende Felder aus, um sich anzumelden!<br>
    Sollten Sie noch keinen Account besitzen, hier <a href="registrieren.php">registrieren</a>.</p>

    <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

    <fieldset>
        <legend>Anmeldedaten</legend>
        <label for="nummer">FW-Nummer:</label>
        <input type="number" name="nummer" id="nummer" placeholder="Feuerwehrpassnummer" ><br><br>
        
        <label for="passwort">Passwort:</label>
        <input type="password" name="passwort" id="passwort" placeholder="Passwort eingeben"><br><br>
    </fieldset> 
    
    <br>
    <input type="submit" value="Anmelden" name="anmelden1">       

    </form>    

</body>
</html>