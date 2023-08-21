<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select jmeno from users where jmeno = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['jmeno'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>