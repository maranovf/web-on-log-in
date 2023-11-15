<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $password_check = $_SESSION['login_user_password'];
   
   $ses_sql = mysqli_query($db,"select name, password from users where name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:../Public/index.php");
      die();
   }
   if(!isset($_SESSION['login_user_password'])){
      header("location:../Public/index.php");
      die();
   }
?>