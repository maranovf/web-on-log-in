<?php
   include("../menu/index.php");
   include("../security/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add user</title>
</head>
<body>
<form action="#" method="post">
  <div>
    <h1 style="margin: 0.5%">Add user</h1>

    <label for="name" style="margin: 0.5%;"><b>Name</b></label>
    <input type="text" style="margin: 0.5%;" placeholder="Enter name" name="name" id="name" required>

    <label for="last_name" style="margin: 0.5%;"><b>Last name</b></label>
    <input type="text" style="margin: 0.5%;" placeholder="Enter last name" name="last_name" id="last_name">

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
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['name']);
      $last_name = mysqli_real_escape_string($db,$_POST['last_name']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $admin = mysqli_real_escape_string($db,$_POST['admin']);

      $sql_add="insert into users(name,last_name,password,admin) values('".$_REQUEST['name']."', '".$_REQUEST['last_name']."', '".$_REQUEST['password']."', '".$_REQUEST['admin']."')";
      $res=mysqli_query($db, $sql_add);
}
?>
</body>
</html>