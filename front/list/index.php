<?php
require '../internal/menu.php';
require '../internal/db_conn.php';
?>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../CSS/list.css" />
		<title>List of works</title>
	</head>

	<body>
        	<table class="tables">
            		<tr>
                		<th>ID</th>
                		<th>Name</th>
                		<th>Action</th>
            		</tr>

<?php
    $sql_files = "SELECT * FROM pdf_uploads";
    $sql_execute = mysqli_query($conn, $sql_files);
    while($row = $sql_execute->fetch_assoc()) {
	$author_key = $row["user_id"];
	$sql_author = "SELECT username FROM users WHERE id=?";
	$author = $conn->execute_query($sql_author, [$author_key]);
	$username = $author->fetch_assoc();
        echo "<tr><td>".$row["filename"]."</td><td>".$username["username"]."</td><td><a href='".$row["filepath"]."' download>Download</a></td></tr>";
        }
?>
        	</table>
	</body>
</html>