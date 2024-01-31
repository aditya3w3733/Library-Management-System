<?php
include("usercheck.php");
include("menu.php");

if(isset($_POST["btnsubmit"])) 
	{
		
		$sql = "SELECT *, DATEDIFF(CURDATE(),dueOn) excess  FROM `issuebook` WHERE returnStatus = 'N' and  bookID =". $_POST["getbookid"] . " order by issuedOn desc ";
		//echo $sql;
		$res = $conn->query($sql);
		
		if($res->num_rows>0)
		{
		$row = $res->fetch_assoc();
		if ($row["excess"]>0){$fine = $row["excess"] *  2 ;} 
		else{$fine = 0;}


		$sql2 = "UPDATE `issuebook` SET  returnStatus = 'Y', returnedOn = now(), fine = ".$fine."   WHERE bookID = ". $_POST["getbookid"];
		//echo $sql2;
		$res2 = $conn->query($sql2);
		if($res){echo "Book Returned <br/> Fine to be collected is Rs .".$fine;}
		}
		else
		{
				echo "Book has not been issued";
		}
	}



?>
<!DOCTYPE html>



<html>
<head>
	<title> 
	 Users
	</title>
	
    <link href="css/ajax.css?dd3" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
	<script src="js/ajax.js?ddx3"></script>
</head>

<body>
<form name="f2" method="POST">

<table width="60%" border="1"  align="center">
	<tr>
		<td>Book No</td>
		<td>	<div><input type="text" name="getbookid1"  id="txt_search" size="30" autocomplete="off"></div>
		 <ul id="searchResult"></ul>
		 
		<div class="clear"></div>
		<div id="bookDetail"></div></td>
	</tr>
	<tr>
		

	<tr>
		<td colspan="2" style="text-align: center;"><input type="submit" name="btnsubmit" value="Submit"></td>
		
	</tr>	
</table>	
</form>
<p> </p>

<p> </p>
<p></p>


<?php
include("footer.php");
?>
