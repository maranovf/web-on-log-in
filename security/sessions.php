<?php
include ("../security/session.php");
include ("../security/connection.php");

$usrnm = $_SESSION['login_user'];
$sql_last_name = "SELECT last_name FROM users WHERE name = '$usrnm'";
$last_name = mysqli_query($db,$sql_last_name);

$row = mysqli_fetch_array($last_name,MYSQLI_ASSOC);
$login_lte = $row['last_name'];

$_SESSION['login_last_name'] = $login_lte;

echo ($login_lte);
?>