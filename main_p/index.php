<?php
   include("../security/session.php");
   include("../menu/index.php");
?>
<html>
   
   <head>
      <title>Welcome</title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
   </body>
   
</html>