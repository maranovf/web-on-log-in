<?php
   include("../menu/index.php");
   include("../security/connection.php");
   include ("../management_menu/index.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Add user</title>
    </head>

    <body>
        <form action="#" method="post">
            <div>
                <h1 style="margin: 0.5%">Add user</h1>

                <label for="name" style="margin: 0.5%;"><b>Name</b></label>
                <input type="text" style="margin: 0.5%;" placeholder="Enter name" name="name" id="name" required>


                <label for="password" style="margin: 0.5%;"><b>Password</b></label>
                <input type="password" style="margin: 0.5%;" placeholder="Enter password" name="password" id="password" required>

                <label for="admin" style="margin: 0.5%;"><b>Admin</b></label>
                <input type="text" style="margin: 0.5%;" placeholder="Admin" name="admin" id="admin" required>
                <hr>

                <button style="margin: 1%;" type="submit">Add</button>
            </div>
        </form>

<?php
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $username = mysqli_real_escape_string($db,$_POST['name']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $admin = mysqli_real_escape_string($db,$_POST['admin']);

      $sql_add="insert into users(name,password,admin) values('".$_REQUEST['name']."', '".$_REQUEST['password']."', '".$_REQUEST['admin']."')";
      $res=mysqli_query($db, $sql_add);
      }
?>
    </body>
</html>