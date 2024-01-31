<?php
include("usercheck.php");
include("menu.php");


$sql = "SELECT `bookID`,bookCode ,`title`, `issuedByName`, `issuedToName`, `issuedOn`, `returnStatus`,`mobile`,dueOn FROM `vw_issuebook` WHERE returnStatus = 'N' order by issuedOn asc";
$res = $conn->query($sql);


if ($res->num_rows>0){
	echo '<div> Records: '.$res->num_rows.'</div><table width="90%" border="1"  align="center">';
	echo "<tr> <th> Book No </th><th> Book Code </th> <th>Title</th> <th>Issued By</th> <th> Issued To </th> <th> Issue Date </th><th> Due Date </th><tr>";
	while($row = $res->fetch_assoc()) {
		
	echo "<tr> <td>". $row ["bookID"] . "</td><td>". $row ["bookCode"] . "</td> <td>". $row ["title"] . "</td> <td>" . $row ["issuedByName"] . "</td> <td>". $row ["issuedToName"]." (".$row["mobile"].")</td>
	 <td>". date("d/m/Y",strtotime($row ["issuedOn"]))."</td> <td>". date("d/m/Y",strtotime($row ["dueOn"]))."</td> </tr>";
	

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
