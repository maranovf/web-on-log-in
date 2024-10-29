<?php
   include("../menu/index.php");
   include("../security/connection.php");
   include ("../management_menu/index.php");
?>

<?php

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $sql_rem="DELETE FROM users WHERE name=('".$_REQUEST['name']."')";
      $rem=mysqli_query($db, $sql_rem);
      header('Location: ../usr_management/');
      exit;
      }
?>