<?php
include ("../menu/index.php");
include ("../security/session.php");
include ("../security/connection.php");
include ("../management_menu/index.php");
?>

<?php
$user = $_REQUEST['name'];
$password = $_REQUEST['password'];
$admin = $_REQUEST['admin'];
?>

        <form action="#" method="post">
            <div>
                <h1 style="margin: 0.5%">Edit account</h1>

                <label for="name" style="margin: 0.5%;"><b>Name</b></label>
                <input type="text" style="margin: 0.5%;" value="<?php echo($user)?>" name="name_e" id="name_e" autocomplete="off" required>


                <label for="password" style="margin: 0.5%;"><b>Password</b></label>
                <input type="password" style="margin: 0.5%;" value="<?php echo($password)?>" name="password_e" id="password_e" autocomplete="off" required>

                <label for="admin" style="margin: 0.5%;"><b>Admin</b></label>
                <input type="text" style="margin: 0.5%;" value="<?php echo($admin)?>" name="admin_e" id="admin_e" autocomplete="off" required>

                <hr>

                <button style="margin: 1%;" type="submit">Submit</button>
            </div>
        </form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $username_edited = mysqli_real_escape_string($db,$_POST['name_e']);
      $password_edited = mysqli_real_escape_string($db,$_POST['password_e']);
      $admin_edited = mysqli_real_escape_string($db,$_POST['admin_e']);


      $sql_user_update="update users set password ='$password_edited' where password = '$password' ";
      $password_update = mysqli_query($db, $sql_user_update);

      $sql_name_update="update users set name ='$username_edited' where name = '$user' ";
      $name_update = mysqli_query($db, $sql_name_update);

      $sql_admin_update="update users set admin ='$admin_edited' where admin = '$admin' ";
      $name_update = mysqli_query($db, $sql_admin_update);
    }
?>