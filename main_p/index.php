<?php
include "../security/session.php";
include "../menu/index.php";

session_start();

$login_session = $_SESSION["login_user"];
?>


<html>
   
   <head>
      <title>Welcome</title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
   </body>
   
</html>