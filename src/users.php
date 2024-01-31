<?php
include("usercheck.php");
include("menu.php");
if(isset($_POST["btnsubmit"])) 
	{
				$pass = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
			 $sql = "INSERT  INTO `users` (displayName,`userName`, `password`,`enabled`, `userTypeId`, `createdBy`, `createdDate`, `bookLimit`) values('".$_POST["dname"]."','".$_POST["username"]."','".$pass."',1, ".$_POST["Usertype"].",1, now(), 2)";
			 //echo $sql;
			 $res = $conn->query($sql);
	}
?>
<!DOCTYPE html>



<html>
<head>
	<title> 
	 Users
	</title>
</head>

<body>
<form name="f2" method="POST">
<h1 style="text-align: center;">User Registration</h1>
<table width="60%" border="1"  align="center">
	<tr>
		<td>Display Name </td>
		<td><input type="text" name="dname"></td>
	</tr>
	<tr>
		<td>Login userName </td>
		<td><input type="text" name="username"></td>
	</tr>
    <tr>
		<td>Password </td>
		<td><input type="password" name="pwd"></td>
	</tr>
	 <tr>
		<td>User Type </td>
		<td><select name = "Usertype">
		<?php
		$sql = "SELECT * FROM `usertypemaster`";
			$res = $conn->query($sql);

			if ($res->num_rows>0){
				while($row = $res->fetch_assoc()) {
					echo "<option value = '". $row ["userTypeId"] . "' selected>" . $row ["userType"] . "</option>";

				}
				}


		?>	

		</select> </td>
	</tr>



	<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Submit"></td>
		
	</tr>	
</table>	
</form>
<p> </p>

<p>&nbsp; </p>
<p> &nbsp;</p>
<p> </p>
<p></p>

<?php

$sql = "SELECT * FROM `users` a join usertypemaster b on a.userTypeId = b.userTypeId where enabled='Y'";
$res = $conn->query($sql);


if ($res->num_rows>0){
	echo '<table width="50%" border="1"  align="center">';
	echo "<tr> <th>User Id</th> <th>Display Name</th> <th>Login Name</th> <th> User Type</th> <tr>";
	while($row = $res->fetch_assoc()) {
		
	echo "<tr> <td>". $row ["userId"] . "</td> <td>". $row ["displayName"] . "</td> <td>" . $row ["userName"] . "</td> <td>" . $row ["userType"] . "</td> </tr>";
	

	}
	echo '</table>';
	}

	else
	{
?>	
	 <div style="text-align: center;">
	<?php 
	echo "0 records found ";}?>
</div>

</body>
<?php
include("footer.php");
?>
