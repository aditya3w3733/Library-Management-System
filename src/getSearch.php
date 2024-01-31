<?php

include("db.php");

//loop 1 Search books
if(isset($_POST['type']) && $_POST['type']=='1' && strlen($_POST["search"]) >2)
{
  $searchText = mysqli_real_escape_string($conn,$_POST['search']);

     $sql = "SELECT `bookID`, concat (bookCode , ' ',`title` ,' ( ', `authorName` ,')') as title  FROM `bookmaster` where bookCode  like '%".$searchText."%' or `title` like '%".$searchText."%' or authorName like '%".$searchText."%' order by title asc limit 0,3";

    $result = mysqli_query($conn,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['bookID'];
        $name = $fetch['title'];

        $search_arr[] = array("id" => $id, "name" => $name);
    }
	echo json_encode($search_arr);
}
	
	
// Loop 2 Set Values for book
if(isset($_POST['type']) && $_POST['type']=='2')
{
    $userid = mysqli_real_escape_string($conn,$_POST['userid']);


     $sql = "SELECT `bookID` as bookID1, concat (bookCode , ' ',`title` ,' ( ', `authorName` ,')') as title  FROM `bookmaster` where bookID =".$userid;

    $result = mysqli_query($conn,$sql);

    $return_arr = array();
    while($fetch = mysqli_fetch_assoc($result)){
        $bookID1 = $fetch['bookID1'];
        $title = $fetch['title'];

        $return_arr[] = array("bookID1"=>$bookID1, "title"=> $title);
    }

    echo json_encode($return_arr);
}
	
//loop 3 Search books
if(isset($_POST['type']) && $_POST['type']=='3' && strlen($_POST["search"]) >3)
{
  $searchText = mysqli_real_escape_string($conn,$_POST['search']);

     $sql = "SELECT `memId`, concat('EmpNo:',ifnull(`empNo`,''),'-CCNO:', ifnull(`ccNo`,''),'-', `name`,'-AADHAAR:', ifnull( `aadhar`,'')) as member FROM `membermaster` WHERE `empNo` like '%".$searchText."%' or  `ccNo`  like '%".$searchText."%' or  `name`  like '%".$searchText."%' or  `aadhar` like '%".$searchText."%'  order by name asc limit 0,5";

    $result = mysqli_query($conn,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['memId'];
        $name = $fetch['member'];

        $search_arr[] = array("id" => $id, "name" => $name);
    }
	echo json_encode($search_arr);
}
	
	
// Loop 4 Set Values for member
if(isset($_POST['type']) && $_POST['type']=='4')
{
    $userid = mysqli_real_escape_string($conn,$_POST['userid']);


      $sql = "SELECT `memId`, concat('EmpNo:',ifnull(`empNo`,''),'-CCNO:', ifnull(`ccNo`,''),'-', `name`,'-AADHAAR:', ifnull( `aadhar`,'')) as member FROM `membermaster` WHERE `memId`=".$userid;

    $result = mysqli_query($conn,$sql);

    $return_arr = array();
    while($fetch = mysqli_fetch_assoc($result)){
        $memId1 = $fetch['memId'];
        $member = $fetch['member'];

        $return_arr[] = array("memId1"=>$memId1, "member"=> $member);
    }

    echo json_encode($return_arr);
}
	
?>