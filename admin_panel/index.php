<?php
session_start();
require 'internal/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($uid, $hash);
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $uid;
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        header("Location: main");
        exit;
    } else {
        $announcement = "Invalid login."; ?>
		<div class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
			<strong><?php echo ($announcement); ?></strong>
		</div>
<?php
    }
    $stmt->close();
}
?>

<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="CSS/forms.css" />
		<link rel="stylesheet" type="text/css" href="CSS/announcements.css" />
		<title>Admin login</title>
	</head>

	<body>
		<div class="forms">
			<form method="POST">
				<input name="username" placeholder="Username"><br>
				<input name="password" type="password" placeholder="Password"><br>
				<button type="submit">Login</button>
			</form>
		</div>
	</body>
</html>
