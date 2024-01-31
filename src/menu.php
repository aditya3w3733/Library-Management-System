<?php


$finePerDay= 1;
$issueDays = 20;


include ("usercheck.php");


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Library Management System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Library Dashboard</div>
                <div class="list-group list-group-flush">

<?php if($_SESSION["usertype"]==2){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="search.php">Search</a><?php } ?>   
 
<?php if($_SESSION["usertype"]==1){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="users.php">Users</a><?php } ?>
<?php if($_SESSION["usertype"]==2){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="members.php">Add Members</a><?php } ?> 
<?php if($_SESSION["usertype"]==2){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="bookadd.php">Add Book</a><?php } ?> 
<?php if($_SESSION["usertype"]==2){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="bookissue.php">Issue Book</a><?php } ?> 
<?php if($_SESSION["usertype"]==2){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="return.php">Return Book</a><?php } ?> 
<?php if($_SESSION["usertype"]==2){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="report_issued.php">Issued Books</a><?php } ?> 
<?php if($_SESSION["usertype"]==3){ ?> <a class="list-group-item list-group-item-action list-group-item-light p-3" href="myreport.php">My Reports</a><?php } ?>              	

                     
                    
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Log Out</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li>
                                	Logged In As <?=$_SESSION["username"]?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    
                    
                