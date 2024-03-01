<?php
include "../security/session.php";
include "../menu/index.php";

session_start();

$logged_user = $_SESSION["login_user"];
?>


<html lang="en">
   
   <head>
    <meta charset="utf-8" />
      <title>Main page</title>
   </head>

   <body>
      <h1>Welcome <?php echo $logged_user; ?></h1>
   </body>
   
</html>