<?php
session_start();
require '../internal/db_conn.php';
require '../internal/menu.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user || $user['is_admin'] != 1) {
    die("Access denied: Admins only.");
}
?>

<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../CSS/general.css" />
		<title>Admin panel</title>
	</head>

	<body>
		<h1 class="center">Admin panel</h1>
	</body>
</html>