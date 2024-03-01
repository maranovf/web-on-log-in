<?php
include ("../menu/index.php");
include ("../security/session.php");
include ("../security/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/tables.css" />
        <title>User management</title>
    </head>

    <body>
        <a href="../usr_add/">Add user</a>
        <table class="tables">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Admin</th>
            </tr>

<?php
    $sql_comm = "SELECT * FROM users";
    $sql_exe = mysqli_query($db, $sql_comm);
    while($row = $sql_exe->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["password"]."</td><td> ".$row["admin"]."</td></tr>";
        }
?>
        </table>
    </body>
</html>