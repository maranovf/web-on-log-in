<?php
$server = 'localhost'; /* Address of the database server */
$name = 'root'; /* Database username */
$password = 'root'; /* Database password */
$db_name = 'users'; /* Name of database */

$db = mysqli_connect($server, $name, $password, $db_name);

if (!$db) {
    die("Database connection error: " . mysqli_connect_error());
    }

echo "";
?>