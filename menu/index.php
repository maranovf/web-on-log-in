<?php
    include ("../security/session.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../CSS/menu.css">
    </head>

    <body>

    <ul>
        <li><a href = "../main_p/">Home</a></li>
        <li><a href="../files/">Files</a></li>
        <li><a href="../upload/">File upload</a></li>
        <li><a href="../management_redirect/">Management</a></li>
        <li><form method="post" action="../search/"><table><tr><td><input type="search" id="search" name="search" placeholder="Hledat" style="margin: 2% 0%; padding: 2% 2%;"></td><td><input type="button" id="search_button" value="Vyhledat" style="margin: 2% 2%; padding: 2% 2%;"></td></tr></table></form></li>
        <li style="float:right"><a href = "../security/logout.php">Sign out</a></li>
    </ul>

    </body>
</html>