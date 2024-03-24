<?php
$data_server = 'localhost'; /* Address of the database server */
$connect_name = 'root'; /* Database username */
$connect_password = 'root'; /* Database password */
$data_name = 'Data'; /* Name of database */

$db_upload = mysqli_connect($data_server, $connect_name, $connect_password, $data_name);

if (!$db_upload) {
    die("Database connection error: " . mysqli_connect_error());
    }

echo "";
?>