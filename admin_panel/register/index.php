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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register_user'])) {
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        $stmt = $conn->prepare("INSERT INTO users (username, password_hash, is_admin) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $_POST['username'], $hash, $is_admin);
        $stmt->execute();
    }
}
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../CSS/forms.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/general.css" />
		<title>Register new user</title>
	</head>

	<body>
		<h1 class="center">Register New User</h1>
		<div class="forms">
			<form method="POST">
				<input name="username" placeholder="Username"><br>
				<input name="password" type="password" placeholder="Password"><br>
				<label><input type="checkbox" name="is_admin" value="1"> Admin</label><br>
				<button name="register_user" value="1">Register</button>
			</form>
		</div>
	</body>
</html>