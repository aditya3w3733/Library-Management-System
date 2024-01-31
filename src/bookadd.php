<?php
include("menu.php");

if(isset($_POST["btnsubmit"])) 
	{
			 $title = mysqli_real_escape_string($conn, $_POST["title"]); 
			 $author = mysqli_real_escape_string($conn, $_POST["author"]); 
			 $bookCode = mysqli_real_escape_string($conn, $_POST["bookCode"]); 
			 $source = mysqli_real_escape_string($conn, $_POST["source"]); 
			 $rackNo = mysqli_real_escape_string($conn, $_POST["rackNo"]); 
			 $shelfNo = mysqli_real_escape_string($conn, $_POST["shelfNo"]); 
			 $billNo = mysqli_real_escape_string($conn, $_POST["billno"]); 
			 $purchasedate = mysqli_real_escape_string($conn, $_POST["purchasedate"]); 
			 $cost = mysqli_real_escape_string($conn, $_POST["cost"]); 
		 $sql = "INSERT INTO  `bookmaster` (`title`, `authorName`, `bookCode`,  `source`, RackNo, shelfNo, `billNo`, `purchaseDate`, `cost`)  VALUES ('$title','$author','$bookCode','$source','$rackNo','$shelfNo','$billNo','$purchasedate','$cost')";
			//echo $sql; exit;

			 $res = $conn->query($sql);
			 if($res) echo "Added Successfully!"; 
			 	else { echo $conn->error;
			 }

	}
?>
<!DOCTYPE html>



<html>
<head>
	<title> 
	 Add Book
	</title>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/demos/style.css">
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd"});
  } );
  </script>	
</head>

<body>
<form name="f2" method="POST">

<table width="40%" border="1"  align="center">
	<tr>
		<td>Book Title </td>
		<td><input type="text" name="title" maxlength="250" required="yes"></td>
	</tr>
    <tr>
		<td>Author Name </td>
		<td><input type="text" name="author" maxlength="100" required="yes"></td>
	</tr>
    <tr>
		<td>Book Code</td>
		<td><input type="text" name="bookCode" maxlength="12" required="yes"></td>
	</tr>
    <tr>
		<td>Source of Purchase</td>
		<td><input type="text" name="source" maxlength="100"></td>
	</tr>
    <tr>
		<td>Rack No</td>
		<td><input type="text" name="rackNo" maxlength="12"></td>
	</tr>
	
    <tr>
		<td>Shelf No</td>
		<td><input type="text" name="shelfNo" maxlength="12"></td>
	</tr>
	
    <tr>
		<td>Bill No </td>
		<td><input type="text" name="billno" maxlength="25"></td>
	</tr>
	<tr>
		<td>Purchase Date</td>
		<td><input type="text" name="purchasedate" id="datepicker" autocomplete="no"></td>
	</tr>
    <tr>
		<td>Cost (in Rs)</td>
		<td><input type="text" name="cost"></td>
	</tr>
	 



	<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Add Book"></td>
		
	</tr>	
</table>	
</form>
<p> </p>

<p> </p>
<p></p>

<?php

$sql = "SELECT * FROM `bookmaster`";
if(!isset($_GET["showall"])) $sql .=" order by bookId desc limit 0,10";
else $sql .=" order by bookId ";

$res = $conn->query($sql);


if ($res->num_rows>0){
	echo '<table width="90%" border="1"  align="center">';
	echo "<tr> <th>Book ID</th> <th>Book Code </th> <th>Title</th> <th>Author</th> <tr>";
	while($row = $res->fetch_assoc()) {
		
	echo "<tr> <td>". $row ["bookID"] . "</td> <td>". $row ["bookCode"] . "</td> <td>" . $row ["title"] . "</td><td>" . $row ["authorName"] . "</td> </tr>";
	

	}
	echo  '<tr><td colspan="3"><a href="bookadd.php?showall=1"> Show All Records</a></td></tr></table> ';
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
