<?php
   include("connection.php");
   session_start();
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);

		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   <head>
   
    <link rel="stylesheet" type="text/css" href="css/style.css" />
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333; " align = "left">
            <div style = "background-color:#333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "name" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>