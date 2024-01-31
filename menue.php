<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü</title>
</head>
<body>
<?php
if (isset($_POST['einsaetze'])) {
    //weiterleiten 
    $pfad = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/einsaetze_melden.php';
    header('Location: ' . $pfad);

}else if (isset($_POST['aktivitaeten'])) {

    //weiterleiten
    $pfad1 = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/aktivitaeten_melden.php';
    header('Location: ' . $pfad1);
}

//test 12321dsjfahsdjfaslfkj



//test nummero 2


?>
<h1>Herrzlich Wilkommen im Menü!</h1>

<h3>Hier können sie entscheiden was sie machen wollen:</h3>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <input type="submit" value="Einsätze melden" name="einsaetze" /> | 
    <input type="submit" value="Aktivitäten melden" name="aktivitaeten" />
</form>
    
</body>
</html>