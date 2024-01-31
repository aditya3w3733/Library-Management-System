<?php
@session_start();
include("db.php");

if(isset($_POST["btnsubmit2"]) && $_POST["btnsubmit2"]=='Submit') 
	{
		echo "checking user";
			unset($_SESSION["userisloggedin"]);
			
			
			echo $sql = "SELECT * FROM USERS WHERE username = '".$_POST["username"]."'";

			 $res = $conn->query($sql);

			 if ($res->num_rows>0)
			 {
			 	 $row = $res->fetch_array();
				 
				 if(password_verify($_POST["pwd"],$row["password"]))
				 {
			 	 $_SESSION["userisloggedin"] = 1;
			 	  $_SESSION["username"] = $row["userName"]; 
			 	  $_SESSION["usertype"] = $row["userTypeId"];
			 	  $_SESSION["userid"] = $row["userId"];
			 	  header('Location:menu.php');
				 }
				 else
				 {
					echo "Invalid credentials"; 				
					echo "<a href = 'login.php'> Go back </a>";}					
					exit();
				 }
			 
			 else { 
			 		
				echo "user not found <br>";
				echo "<a href = 'login.php'> Go back </a>";
				exit();
				}
	}
	 


	if (!isset($_SESSION["userisloggedin"]))
		{
		echo "You are not authorised <br>";
     	echo "<a href = 'login.php'> Login to continue </a>";
     	exit();
		}
?>