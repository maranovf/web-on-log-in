<?php
   include("connection.php");
   session_start();
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['jmeno']);
      $mypassword = mysqli_real_escape_string($db,$_POST['heslo']); 
      
      $sql = "SELECT id FROM users WHERE jmeno = '$myusername' and heslo = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);

		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
    <link rel="stylesheet" type="text/css" href="css/style.css" />
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "jmeno" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "heslo" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>