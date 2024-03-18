    <?php
        require_once("autorisieren.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="style_admin.css">
    </head>
    <body>
        <h1>Herzlich Willkommen auf der Adminseite der Freiwilligen Feuerwehr St. Schmorrel</h1><hr>

        <div class="button-container">
    <a href="startseite.php" class="btn btn-dark">Zur Startseite</a>
    ||
    <a href="menue.php" class="btn btn-dark">Zum Menü</a>
    </div>


        

        <h3>Hier finden sie unsere letzten Einsätze, welche Sie entweder BESTÄTIGEN oder LÖSCHEN können:</h3><hr>

    <?php

        require_once('dbconnection.php');

        try {
            $statement = $pdo->prepare("SELECT * FROM einsaetze");

            $statement->execute();

            echo "<table>";

            if ($statement->rowCount() > 0) {
                while ($zeile = $statement->fetch()) {
                    echo "<tr>" .
                        "<th>Datum</th>" . "<th>Stichwort</th>" . "<th>Einsatzart</th>" . 
                        "<th>Einsatzort</th>" . "<th>Fahrzeuge</th>" . "<th>Weitere Kräfte</th>" .
                        "<th>Erstellt von</th>" . "<th> </th>" . "<th> </th>" .
                        "</tr>" . 
                        "<tr>" .
                        "<td>" . $zeile['datum'] . "</td>" .
                        "<td>" . $zeile['stichwort'] . "</td>" .
                        "<td>" . $zeile['einsatzart'] . "</td>" .
                        "<td>" . $zeile['einsatzort'] . "</td>" .
                        "<td>" . $zeile['fahrzeuge'] . "</td>" .
                        "<td>" . $zeile['weitere_kraefte'] . "</td>" .
                        "<td>" . $zeile['erstellt_von'] . "</td>" .

                        "<td>" . "<a href='e_loeschen.php?E_ID=$zeile[E_ID]&datum=$zeile[datum]&stichwort=$zeile[stichwort]&einsatzart=$zeile[einsatzart]&einsatzort=$zeile[einsatzort]&fahrzeuge=$zeile[fahrzeuge]&weitere_kraefte=$zeile[weitere_kraefte]&beschreibung=$zeile[beschreibung]&erstellt_von=$zeile[erstellt_von]&bestaetigt=$zeile[bestaetigt]'>Löschen</a>" . "</td>";
                
                
                    if($zeile['bestaetigt'] == 0) {

                        echo "<td>". "<a href='e_bestaetigen.php?E_ID=$zeile[E_ID]&datum=$zeile[datum]&stichwort=$zeile[stichwort]&einsatzart=$zeile[einsatzart]&einsatzort=$zeile[einsatzort]&fahrzeuge=$zeile[fahrzeuge]&weitere_kraefte=$zeile[weitere_kraefte]&beschreibung=$zeile[beschreibung]&erstellt_von=$zeile[erstellt_von]&bestaetigt=$zeile[bestaetigt]'>Bestätigen</a>" . "</tr>" .
                            "</tr>";
                    }

                }

            }

            echo "</table>";
            echo "<hr><hr>";

        } catch (PDOException $ex) {
            die("Fehler beim Ausgeben der Datenbank! " . $ex->getMessage());
        }

    ?>

    <h3>Hier finden sie unsere Aktivitäten, welche Sie entweder BESTÄTIGEN oder LÖSCHEN können:</h3><hr>

    <?php
        require_once('dbconnection.php');

        try {
            $statement = $pdo->prepare("SELECT * FROM aktivitaeten");

            $statement->execute();

            echo "<table>";

            if ($statement->rowCount() > 0) {
                while ($zeile = $statement->fetch()) {

                    echo "<tr>" .
                        "<th>Datum</th>" . "<th>Aktivität</th>" . "<th>Ort</th>" . 
                        "<th>Erstellt von</th>" . "<th> </th>" . "<th> </th>" .
                        "</tr>" . 
                        "<tr>" .
                        "<td>" . $zeile['datum'] . "</td>" .
                        "<td>" . $zeile['aktivitaet'] . "</td>" .
                        "<td>" . $zeile['ort'] . "</td>" .
                        "<td>" . $zeile['erstellt_von'] . "</td>" .

                        "<td>" . "<a href='a_loeschen.php?A_ID=$zeile[A_ID]&datum=$zeile[datum]&aktivitaet=$zeile[aktivitaet]&ort=$zeile[ort]&beschreibung=$zeile[beschreibung]&erstellt_von=$zeile[erstellt_von]&bestaetigt=$zeile[bestaetigt]'>Löschen</a>" . "</td>";

                    if($zeile['bestaetigt'] == 0) {

                        echo "<td>". "<a href='a_bestaetigen.php?A_ID=$zeile[A_ID]&datum=$zeile[datum]&aktivitaet=$zeile[aktivitaet]&ort=$zeile[ort]&beschreibung=$zeile[beschreibung]&erstellt_von=$zeile[erstellt_von]&bestaetigt=$zeile[bestaetigt]'>Bestätigen</a>" . "</tr>" .
                            "</tr>";
                    }    

                }

            }

            echo "</table>";
            echo "<hr><hr>";

        } catch (PDOException $ex) {
            die("Fehler beim Ausgeben der Datenbank! " . $ex->getMessage());
        }

    ?>

    <h3>Hier finden sie unsere Mitglieder, welche Sie LÖSCHEN können:</h3><hr>

    <?php
        require_once('dbconnection.php');

        try {
            $statement = $pdo->prepare("SELECT * FROM mitglieder");

            $statement->execute();

            echo "<table>";

            if ($statement->rowCount() > 0) {
                while ($zeile = $statement->fetch()) {

                    echo "<tr>" .
                    "<th>FW-Nummer</th>" . "<th>Vorname</th>" . "<th>Nachname</th>" . 
                    "<th>E-Mail-Adresse</th>" . 
                    "</tr>" . 
                    "<tr>" .
                    "<td>" . $zeile['fw_nr'] . "</td>" .
                    "<td>" . $zeile['vorname'] . "</td>" .
                    "<td>" . $zeile['nachname'] . "</td>" .
                    "<td>" . $zeile['email'] . "</td>" .

                    "<td>" . "<a href='m_loeschen.php?M_ID=$zeile[M_ID]&vorname=$zeile[vorname]&nachname=$zeile[nachname]&email=$zeile[email]&fw_nr=$zeile[fw_nr]&passwort=$zeile[passwort]&dienstgrad=$zeile[dienstgrad]&bild_pfad=$zeile[bild_pfad]'>Löschen</a>" . "</td>" . 
                    "</tr>";

                }

            }

            echo "</table>";

        } catch (PDOException $ex) {
            die("Fehler beim Ausgeben der Datenbank! " . $ex->getMessage());
        }

    ?>
        

    </body>
    </html>