<?php
include ("../security/session.php");
include ("../security/connection.php");

$admin = "SELECT admin FROM users WHERE name='$login_session'";
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
			 header("location:../semi_public/");
                        }

?>