<?php
session_start();
require '../internal/db_conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Check if current user is an admin
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
		<link rel="stylesheet" type="text/css" href="../CSS/menu.css" />
	</head>

	<body>
		<div class="div">
			<a href="../main/">Home</a>
			<a href="../register/">Registration</a>
			<a href="../files/">Files</a>
			<a href="../usr/">Users</a>
			<a href="../logout/">Log out</a>
		</div>
	</body>
</html>