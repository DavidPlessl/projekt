<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style_anmelden.css">
    
</head>
<body>
   
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    
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

                    $_SESSION['nummer'] = $nummer;
                    $_SESSION['passwort'] = $passwort;

                    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/menue.php';
                    header('Location: ' . $pfad);

                } else {
                    echo "Bitte überprüfen Sie Ihr Passwort!";
                    $formular_anzeigen = true;
                }

            }

        }    

    }else if (isset($_POST['zurueck'])) {

        //weiterleiten
        $pfad1 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/startseite.php';
        header('Location: ' . $pfad1);
    }  

    ?>
    </head>
    <body>
	<div class="login">
        <h1>Anmelden</h1>

    <p>Bitte füllen Sie folgende Felder aus, um sich anzumelden!<br>
    Sollten Sie noch keinen Account besitzen, hier <a href="registrieren.php">registrieren</a>.</p>
    
			<form action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="post">
				<label for="nummer">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="nummer" placeholder="FW-Nummer" id="nummer" required>
				<label for="passwort">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="passwort" placeholder="Passwort eingeben" id="passwort" required>
				<input type="submit" value="Anmelden" name="anmelden1">
                <input type="submit" value="Zurück zur Startseite" name="zurueck" />
			</form>
		</div>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">


    
</body>
</html>