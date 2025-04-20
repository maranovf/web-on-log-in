<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/");
    exit;
}

require '../internal/db_conn.php';
require '../internal/logged_in_menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    $hash = password_hash($new_password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
    $stmt->bind_param("si", $hash, $_SESSION['user_id']);
    $stmt->execute();
    echo "Password updated.";
}
?>

<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../CSS/forms.css" />
		<title>Change password</title>
	</head>

	<body>

		<form method="POST" class="forms">
    			<input type="password" name="new_password" placeholder="New Password"><br>
			<button type="submit">Change Password</button>
		</form>

	</body>
</html>
