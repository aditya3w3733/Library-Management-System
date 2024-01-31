<?php
include("usercheck.php");
include("menu.php");
if (isset($_SESSION["usertype"])  && $_SESSION["usertype"]!= 1 )
{
	echo "You are not authorised";
	exit();
}



if(isset($_POST["btnsubmit"])) 
	{
			 $sql = "insert into `usertypemaster` (userType) values ('".$_POST["usertyp"]."')";
			 $res = $conn->query($sql);
	}
?>
<!DOCTYPE html>



<html>
<head>
	<title> 
	 User type Master
	</title>
</head>

<body>
<form name="f1" method="POST">

<table width="30%" border="1"  align="center">
	<tr>
		<td>User Type</td>
		<td><input type="text" name="usertyp"></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Save"></td>
		
	</tr>	
</table>	
</form>
<p> </p>
<?php

$sql = "SELECT * FROM `usertypemaster`";
$res = $conn->query($sql);

if ($res->num_rows>0){
	echo '<table width="30%" border="1"  align="center">';
	echo "<tr> <th>User Id</th> <th>User Name</th> <tr>";
	while($row = $res->fetch_assoc()) {
		echo "<tr> <td>". $row ["userTypeId"] . "</td> <td>" . $row ["userType"] . "</td> </tr>";

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