<?php
include ("../menu/index.php");
include ("../security/session.php");
include ("../security/connection.php");

session_start();
?>

<?php
   $user = $_SESSION['login_user'];
   $password = $_SESSION['login_user_password'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Edit account</title>
    </head>

    <body>
        <form action="#" method="post">
            <div>
                <h1 style="margin: 0.5%">Edit account</h1>

                <label for="name" style="margin: 0.5%;"><b>Name</b></label>
                <input type="text" style="margin: 0.5%;" value="<?php echo($user)?>" name="name" id="name" autocomplete="off" required>


                <label for="password" style="margin: 0.5%;"><b>Password</b></label>
                <input type="password" style="margin: 0.5%;" value="<?php echo($password)?>" name="password" id="password" autocomplete="off" required>

                <hr>

                <button style="margin: 1%;" type="submit">Submit</button>
            </div>
        </form>
    </body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $username_new = mysqli_real_escape_string($db,$_POST['name']);
      $password_new = mysqli_real_escape_string($db,$_POST['password']);


      $sql_password_update="update users set password ='$password_new' where password = '$password' ";
      $res = mysqli_query($db, $sql_password_update);

      $sql_name_update="update users set name ='$username_new' where name = '$user' ";
      $res3 = mysqli_query($db, $sql_name_update);

      header('Location: ../public');
      exit;
    }
?>