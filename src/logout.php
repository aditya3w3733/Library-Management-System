<?php
@session_start();
unset($_SESSION["userisloggedin"]);
unset($_SESSION["username"]);			 	   
unset($_SESSION["usertype"]);
unset($_SESSION["userid"]);		 	   
header('Location:login.php');
?>