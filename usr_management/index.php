<?php
include ("../menu/index.php");
include ("../security/session.php");
include ("../security/connection.php");
include ("../management_menu/index.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/tables.css" />
        <title>User management</title>
    </head>

    <body>
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
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["password"]."</td><td> ".$row["admin"]."</td><td><form method='post' action='../usr_delete/index.php'><input type='hidden' name='name' id='name' value='".$row["name"]."'><input type='submit' value='Delete'></form></td><td><form method='post' action='../usr_edit/index.php'><input type='hidden' name='name' id='name' value='".$row["name"]."'><input type='hidden' name='password' id='password' value='".$row["password"]."'><input type='hidden' name='admin' id='admin' value='".$row["admin"]."'><input type='submit' value='Edit'></form></td></tr>";
        }
?>
        </table>
    </body>
</html>