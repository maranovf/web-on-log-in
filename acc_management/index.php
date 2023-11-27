<?php
include ("../menu/index.php");
include ("../security/session.php");
include ("../security/sessions.php");
?>

<?php
   $user_edit = $_SESSION['login_user'];
   $password_edit = $_SESSION['login_user_password'];
   $last_name_edit = $_SESSION['login_last_name'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit account</title>
</head>
<body>
<form action="#" method="post">
  <div>
    <h1 style="margin: 0.5%">Edit account</h1>

    <label for="name" style="margin: 0.5%;"><b>Name</b></label>
    <input type="text" style="margin: 0.5%;" value="<?php echo($user_edit)?>" name="name" id="name" required>

    <label for="last_name" style="margin: 0.5%;"><b>Last name</b></label>
    <input type="text" style="margin: 0.5%;" value="<?php echo($last_name_edit) ?>" name="last_name" id="last_name">

    <label for="password" style="margin: 0.5%;"><b>Password</b></label>
    <input type="password" style="margin: 0.5%;" value="<?php echo($password_edit)?>" name="password" id="password" required>

    <hr>

    <button style="margin: 1%;" type="submit">Submit</button>
  </div>
</form>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // username and password sent from form

      $username = mysqli_real_escape_string($db,$_POST['name']);
      $last_name = mysqli_real_escape_string($db,$_POST['last_name']);
      $password = mysqli_real_escape_string($db,$_POST['password']);

      $sql_update="UPDATE users WHERE id SET name = '$username', last_name = '$last_name', password = '$password'";
      $res=mysqli_query($db, $sql_update);
}
?>