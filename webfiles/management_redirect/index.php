<?php
include ("../security/session.php");
include ("../security/connection.php");
session_start();

$logged_user = $_SESSION['login_user'];

$admin = "select admin from users where name='$logged_user'";
$admin_query = mysqli_query($db, $admin);
if(! $admin_query )
{
  die('' . mysql_error());
}

$roww = mysqli_fetch_array($admin_query,MYSQLI_ASSOC);

if ($roww['admin']==1){
 header("location:../usr_management/");
                        }
                        elseif ($roww['admin']==0) {
			 header("location:../acc_management/");
                        }

?>