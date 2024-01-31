<?php
include("menu.php");
if(isset($_POST["btnsubmit"])) 
	{
		
		$name = mysqli_real_escape_string($conn, $_POST["dname"]); 
		if($_POST["empno"]!='') $empno = mysqli_real_escape_string($conn, $_POST["empno"]);  else $empno='NULL';
		if($_POST["ccno"]!='') $ccno = mysqli_real_escape_string($conn, $_POST["ccno"]);  else $ccno='NULL';
		$email = mysqli_real_escape_string($conn, $_POST["email"]); 
		$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]); 
		$address = mysqli_real_escape_string($conn, $_POST["address"]); 
		if($_POST["aadhar"]!='') $aadhar = mysqli_real_escape_string($conn, $_POST["aadhar"]); else $aadhar='NULL';
		$createdby = $_SESSION["userid"];
				
			 $sql = "INSERT into  `membermaster` (`empNo`, `ccNo`, `name`, `email`, `mobile`, `address`, `aadhar`, `active`, `createdBy`, `createdDate`)  VALUES ($empno,$ccno,'".$name."','$email','".$mobile."','".$address."',".$aadhar.",'Y',$createdby,now());";
			 //echo $sql; //exit();
			 $res = $conn->query($sql);
			 if($res) echo "Added Successfully!"; else echo $conn->error;
	}
?>
<!DOCTYPE html>



<html>
<head>
	<title> 
	 Manage Members
	</title>
</head>

<body>
<form name="f2" method="POST">
<h1 style="text-align: center;">Members Registration</h1>
<table width="50%" border="1"  align="center">
	<tr>
		<td>Member Name </td>
		<td><input type="text" name="dname" required="yes"></td>
	</tr>
	<tr>
		<td>Emp No </td>
		<td><input type="text" name="empno"></td>
	</tr>
    <tr>
		<td>CC No </td>
		<td><input type="text" name="ccno"></td>
	<tr>
    <tr>
		<td>email</td>
		<td><input type="text" name="email" required="yes"></td>
	<tr>
    <tr>
		<td>Mobile </td>
		<td><input type="text" name="mobile" required="yes"></td>
	<tr>
    <tr>
		<td>Address </td>
		<td><input type="text" name="address"></td>
	<tr>
	
    <tr>
		<td>AADHAR </td>
		<td><input type="text" name="aadhar"></td>
	<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Add Member"></td>
		
	</tr>	
</table>	
</form>
<p> </p>

<p> </p>
<p></p>

<div style="text-align:center"> 
Existing Members 
</div>

<?php

$sql = "SELECT * FROM `membermaster` ";
if(!isset($_GET["showall"])) $sql .=" order by memId desc limit 0,10";
else $sql .=" order by memId ";
$res = $conn->query($sql);


if ($res->num_rows>0){
	echo '<table width="90%" border="1"  align="center">';
	echo "<tr> <th>Member Id</th> <th> CC No <th> Emp No</th> <th> AADHAR </th><th> Name</th> <th> Mobile</th> <tr>";
	while($row = $res->fetch_assoc()) {
		
	echo "<tr> <td>". $row ["memId"] . "</td> <td>" . $row ["ccNo"] . "</td> <td>" . $row ["empNo"] . "</td> <td>" . $row ["aadhar"] . "</td> <td>" . $row ["name"] . "</td> <td>" . $row ["mobile"] . "</td> </tr>";
	

	}
	echo '<tr><td colspan="3"><a href="members.php?showall=1"> Show All Records</a></td></tr></table> ';
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
