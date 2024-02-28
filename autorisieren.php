<?php

$benutzername = 'Chef';
$passwort = '1234';

if (
  !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
  ($_SERVER['PHP_AUTH_USER'] != $benutzername) || ($_SERVER['PHP_AUTH_PW'] != $passwort)
) {

  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="projekt"');

  exit('<h2>Admin</h2>Tut uns wirklich Leid, aber auf diese Seite können ' .
    'Sie nur mit den richtigen Zugangsdaten zugreifen.');
}

?>
