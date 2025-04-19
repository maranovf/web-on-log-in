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
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../CSS/list.css" />
        <title>Users</title>
    </head>

    <body>
        <table class="tables">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Admin</th>
                <th>Action</th>
            </tr>

<?php
    $sql_comm = "SELECT * FROM users";
    $sql_exe = mysqli_query($conn, $sql_comm);
    while($row = $sql_exe->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td> ".$row["is_admin"]."</td><td><form method='post' action='../usr/delete.php'><input type='hidden' name='id' id='id' value='".$row["id"]."'><input type='submit' value='Delete'></form></td></tr>";
        }
?>
        </table>
    </body>
</html>