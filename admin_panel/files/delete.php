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

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $sql_rem="DELETE FROM pdf_uploads WHERE id=('".$_REQUEST['file_key']."')";
      $rem=mysqli_query($conn, $sql_rem);
      }
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../CSS/forms.css" />
		<title>Success</title>
	</head>

	<body>
		<div class="forms">
			<p>Operation successful.</p>
			<form action="../files/">
    				<input type="submit" value="Go back" />
			</form>
		</div>
	</body>
</html>