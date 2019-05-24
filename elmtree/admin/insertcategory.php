<?php
	
	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}
	
	$myuserid = $_SESSION['40146582_id'];
	$myusername = $_SESSION['40146582_user'];
	$myfirstname = $_SESSION['40146582_firstname'];
	$adminrole = $_SESSION['40146582_admin'];
	
	include('../conn.php');
	
	$categoryname = $conn->real_escape_string($_POST["insertcatname"]);
	$categorydesc = $conn->real_escape_string($_POST["insertcatdesc"]);
	
	$insert = "insert into elmtree_categories (categoryname, categorydesc) values('$categoryname', '$categorydesc')";
	
	$result = $conn->query($insert);
	
	if(!$result){
		echo $conn->error;
	}	else {
		header("location: categorylist.php");
	}	

?>