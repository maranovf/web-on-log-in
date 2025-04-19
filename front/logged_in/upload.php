<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/");
    exit;
}

require '../internal/db_conn.php';
require '../internal/logged_in_menu.php';

$upload_dir = '../uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0750, true);
}

$announcement = "";
$at = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $announcement = die("Invalid CSRF token");
	$at = "w";
    }

    $file = $_FILES['pdf'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $announcement = die("Upload error.");
	$at = "w";
    }

    if ($file['type'] !== 'application/pdf') {
        $announcement = die("Only PDFs are allowed.");
	$at = "w";
    }

    if ($file['size'] > 10 * 1024 * 1024) {
        $announcement = die("File too large.");
	$at = "w";
    }

    $extension = ".pdf";
    $upload_name = basename($file['name']);
    $tar = $upload_name . "_" . uniqid('pdf_', true) . $extension;
    $target = $upload_dir . $tar;

    if (move_uploaded_file($file['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO pdf_uploads (user_id, filename, filepath) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $_SESSION['user_id'], $tar, $target);
        $stmt->execute();
        $announcement = "PDF uploaded successfully.";
	$at = "g";
    } else {
        $announcement = "Failed to save file.";
	$at = "w";
    }
}
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../CSS/forms.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/announcements.css" />
		<title>Upload</title>
	</head>

	<body>

		<form method="POST" enctype="multipart/form-data" class="forms">
			<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
			<input type="file" name="pdf" accept="application/pdf"><br>
			<button type="submit" width="50%">Upload PDF</button>
		</form>

<?php
if ($announcement != "") {
	if ($at = "g") { ?>
		<div class="gr">
			<span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
			<strong><?php echo ($announcement); ?></strong>
		</div>
<?php
	} else { ?>
		<div class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display="none";">&times;</span>
			<strong><?php echo ($announcement); ?></strong>
		</div>
<?php
	}
}
?>

	</body>
</html>