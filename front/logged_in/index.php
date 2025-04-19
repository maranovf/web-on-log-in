<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/");
    exit;
}
require '../internal/logged_in_menu.php';
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Account home</title>
	</head>

	<body>
	</body>
</html>