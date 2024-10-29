<?php
   include("../security/connection.php");

   session_start();

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $myusername = mysqli_real_escape_string($db,$_POST['name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $name = $_POST['name'];
      
      $sql_username = "SELECT name FROM users WHERE name = '$myusername'";
      $sql_password = "SELECT password FROM users WHERE password = '$mypassword'";


      $result_username = mysqli_query($db,$sql_username);
      $result_password = mysqli_query($db,$sql_password);


      $row_username = mysqli_fetch_array($result_username,MYSQLI_ASSOC);
      $row_password = mysqli_fetch_array($result_password,MYSQLI_ASSOC);

      $count_username = mysqli_num_rows($result_username);
      $count_password = mysqli_num_rows($result_password);


      if($count_username == 1) {
        if($row_username == true) {
        //verifies username
            if($count_password == 1) {
                if($row_password == true) {
                //verifies password

                    $_SESSION['login_user'] = $myusername;
                    $_SESSION['login_user_password'] = $mypassword;
         
                    header("location:../main_p/");
                    }
                }
            }
      }
      else {
      }
   }
?>

<html lang="en">
   <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333; " align = "left">
            <div style = "background-color:#333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "name" class = "box" autocomplete="off" requiered /><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" autocomplete="off" requiered /><br/><br />
                  <input type = "submit" value = " Log in "/><br />
               </form>

            </div>
				
         </div>
			
      </div>

   </body>
</html>