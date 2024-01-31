<?php
include("usercheck.php");
include("menu.php");
if(isset($_POST["btnsubmit"]))



?>

<form name="f2" method="POST">
<table width="60%" border="1"  align="center">
<tr>
		<td>Title / Author Name</td>
		<td><input type="text" name="title"></td>
	</tr>



<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Search"></td>
		
	</tr>
</table>
</form>	
<br><br>

<?php
if(isset($_POST["btnsubmit"])){

$sql = "SELECT * FROM `bookmaster` WHERE `title` LIKE '%". $_POST["title"]. "%' or `authorName` LIKE '%". $_POST["title"]. "%'";
//echo $sql;
$res = $conn->query($sql);


if ($res->num_rows>0){
	echo '<table width="90%" border="1"  align="center">';
	echo "<tr> <th>Book ID </th><th>Book Code </th> <th>Title </th> <th>Author Name </th> <th>Rack No/ Shelf No</th></tr>";

	while($row = $res->fetch_assoc()) {
		
	echo "<tr> <td>". $row ["bookID"] . "</td> <td>". $row ["bookCode"] . "</td> <td>" . $row ["title"] . "</td> <td>" . $row ["authorName"] . "</td> <td>" . $row ["rackNo"] ."/". $row ["shelfNo"] . 	"</td> </tr>";
	

	}
	echo '</table>';
	}
}
?>