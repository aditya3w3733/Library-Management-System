<?php
include("usercheck.php");
include("menu.php");
if(isset($_POST["btnsubmit"])) 
	{
		// Check if the user exists or else exit
		$sql3 = "SELECT * FROM `membermaster` where active ='Y' and memId =" . $_POST ["getmemberno"];
		$res3 = $conn->query($sql3);
		if ($res3->num_rows>0)
		{//echo ""
		//check if user has crossed book limit or exit
			$row3 = $res3->fetch_assoc();
			$sql4 = "SELECT * From `issuebook` where returnStatus = 'N' and issuedTo =" . $row3["memId"];
			$res4 = $conn->query($sql4);
			if($res4->num_rows>=$row3["bookLimit"])
			{
				echo "User has already exhausted his limit <a href = 'bookissue.php'> Go back </a>"; exit();
			}

		}
		else  {
			echo "User Not Found <a href = 'bookissue.php'>  </a>";
			 exit ();
			 } 


			 }

			 //SELECT * FROM `issuebook` WHERE bookID = 151 and returnStatus = 'N';

	}
	$date1 = date("Y-m-d");
?>
<!DOCTYPE html>



<html>
<head>
	<title> 
	 Users
	</title>
</head>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/demos/style.css">
  <link href="css/ajax.css?dd3" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
	<script src="js/ajax.js?ddx3"></script>
  <script src="js/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd"});
  } );
  </script>	

<body>
<form name="f2" method="POST">

<table width="60%" border="1"  align="center">

	<tr>
		<td>Member No  </td>
		<td>
		<div><input type="text" name="getmemberno1"  id="txt_search2" autocomplete="off"></div>
		 <ul id="searchResult2"></ul>
			 
		<div class="clear"></div>
		<div id="userDetail"></div>		
		</td>
	</tr>
	
	<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Submit"></td>
		
	</tr>	
</table>	
</form>
<p> </p>

<p> &nbsp;</p>
<p></p>

<?php

$sql = "SELECT `bookID`, `bookCode` ,`title`, `issuedByName`, `issuedToName`, `issuedOn`, `returnStatus`,dueOn FROM `vw_issuebook` WHERE returnStatus = 'N' order by issuedOn desc limit 0,25 ";
$res = $conn->query($sql);


if ($res->num_rows>0){
	echo '<table width="90%" border="1"  align="center"><tr><td colspan="7" align="center">Issued books </td></tr>';
	echo "<tr> <th> Book No </th> <th> Book COde </th> <th>Title</th> <th>Issued By</th> <th> Issued To </th> <th> Issue Date </th><th> Due Date </th><tr>";
	while($row = $res->fetch_assoc()) {
		
	echo "<tr> <td>". $row ["bookID"] . "</td> <td>". $row ["bookCode"] . "</td> <td>". $row ["title"] . "</td> <td>" . $row ["issuedByName"] . "</td> <td>". $row ["issuedToName"]."</td>
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
