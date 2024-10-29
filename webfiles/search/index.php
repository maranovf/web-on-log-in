<?php
include "../security/session.php";
include "../menu/index.php";
include ("../security/data_connection.php");

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/tables.css" />
        <title>Search</title>
    </head>

    <body>
        <table class="tables">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th></th>
            </tr>

<?php
    $search = $_POST["search"];
    $sql_search = "SELECT * FROM data WHERE file = '$search'";
    $sql_prep = mysqli_query($db_upload, $sql_search);
    while($row = $sql_prep->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["file"]."</td><td><a href='".$row["path"]."' download>Download</a></td></tr>";
        }
?>