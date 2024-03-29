<?php
include ("../menu/index.php");
include ("../security/session.php");
include ("../security/data_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/tables.css" />
        <title>Files</title>
    </head>

    <body>
        <table class="tables">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </tr>

<?php
    $sql_files = "SELECT * FROM data";
    $sql_execute = mysqli_query($db_upload, $sql_files);
    while($row = $sql_execute->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["file"]."</td><td><a href='".$row["path"]."' download>Download</a></td></tr>";
        }
?>
        </table>
    </body>
</html>