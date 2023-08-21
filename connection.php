<?php
$server = 'localhost'; /* Název serveru, ke kterému se budeme připojovat */
$jmeno = 'root'; /* Jméno uživatele do DB */
$password = 'root'; /* Heslo uživatele do DB */
$db_name = 'users'; /* Název databáze, ve které jsme si vytvořili tabulku "uzivatele" */

$db = mysqli_connect($server, $jmeno, $password, $db_name);

if (!$db) {
    die("Připojení selhalo: " . mysqli_connect_error());
    }

echo "Úspěšné připojení k MySQL serveru";
?>