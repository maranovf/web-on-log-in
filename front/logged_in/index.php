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
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
		<title>Account home</title>
	</head>

	<body>
	</body>
</html>