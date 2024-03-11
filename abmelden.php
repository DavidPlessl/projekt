<?php
    session_start();

    if(isset($_SESSION['nummer'])){
        //Sesionvariablemüssen gelöscht werden.
        $_SESSION = array(); //alle Sessionvariablen löschen
        session_destroy(); //Session löschen
    }

    //meldung ausgeben (z. B: Sie haben sich erfolgreich abgemeldet!)
    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/startseite.php';
    header('Location: ' . $pfad);
?>