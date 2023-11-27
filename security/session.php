<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $password_check = $_SESSION['login_user_password'];
   
   $check_name = mysqli_query($db,"select name from users where name = '$user_check' ");
   $check_password = mysqli_query($db,"select password from users where name = '$user_check' ");
   
   $row_name = mysqli_fetch_array($check_name,MYSQLI_ASSOC);
   $row_password = mysqli_fetch_array($check_password,MYSQLI_ASSOC);
   
   $login_session = $row_name['name'];
   $login_session_password = $row_password['password'];
   
   if ($login_session!=($_SESSION['login_user'])){
      header("location:../Public/index.php");
      die();
   }
   if($login_session_password!=($_SESSION['login_user_password'])){
      header("location:../Public/index.php");
      die();
   }
?>