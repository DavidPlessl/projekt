<?php

    require_once('dbConnection.php');

    try {
        $statement = $pdo->prepare("SELECT * FROM einsaetze");

        $statement->execute();

        echo "<table>";
        echo "<hr>";

        if ($statement->rowCount() > 0) {
            while ($zeile = $statement->fetch()) {
                echo "<tr>" .
                    "<td style='font-weight: bold;'>" . $zeile['datum'] . "</td>" .
                    "<td style='font-weight: bold;'>" . $zeile['stichwort'] . "</td>" .
                    "<td style='font-weight: bold; >" . $zeile['einsatzart'] . "</td>" .
                    "<td style='font-weight: bold; >" . $zeile['einsatzort'] . "</td>" .
                    "<td style='font-weight: bold; >" . $zeile['fahrzeuge'] . "</td>" .
                    "<td style='font-weight: bold; >" . $zeile['weitere_kraefte'] . "</td>" .
                    "<td style='font-weight: bold; >" . $zeile['beschreibung'] . "</td>" .
                    "<td style='font-weight: bold; >" . $zeile['erstellt_von'] . "</td>" .
                    "<td><a href='eintragloeschen.php?datum=$zeile[datum]&stichwort=$zeile[stichwort]
                                                                    &einsatzart=$zeile[einsatzart]&einsatzort=$zeile[einsatzort]
                                                                    &fahrzeuge=$zeile[fahrzeuge]&weitere_kraefte=$zeile[weitere_kraefte]
                                                                    &beschreibung=$zeile[beschreibung]&erstellt_von=$zeile[erstellt_von]
                                                                    >Löschen</a></td>";
                if($zeile['bestaetigt'] == 0){
                    echo "<td><a href='bestaetigt.php?id=$zeile[e_id]&datum=$zeile[datum]&stichwort=$zeile[stichwort]
                    &einsatzart=$zeile[einsatzart]&einsatzort=$zeile[einsatzort]
                    &fahrzeuge=$zeile[fahrzeuge]&weitere_kraefte=$zeile[weitere_kraefte]
                    &beschreibung=$zeile[beschreibung]&erstellt_von=$zeile[erstellt_von]
                    >Bestätigen</a></tr>";
                }
            }
        }
        echo "</table>";
    } catch (PDOException $ex) {
        die("Fehler beim Ausgeben der Datenbank! " . $ex->getMessage());
    }
    


    ?>