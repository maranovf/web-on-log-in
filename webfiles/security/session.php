<?php
session_start();

if(!isset($_SESSION["login_user"])) {
    if ($_SESSION["login_user"] !== true){
        if(!isset($_SESSION["login_user_password"])) {
            if ($_SESSION["login_user_password"] !== true){
	            header('Location: ../public');
	            exit;
	            }
	        }
	    }
	}
?>