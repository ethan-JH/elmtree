<?php

	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}
	
	$myuserid = $_SESSION['40146582_id'];
	$myusername = $_SESSION['40146582_user'];
	$myfirstname = $_SESSION['40146582_firstname'];
	$adminrole = $_SESSION['40146582_admin'];
	
	include("../conn.php");
	
	$messageid = $conn->real_escape_string($_GET['messageid']);
	
	$deletequery = "DELETE FROM elmtree_messages WHERE messageid=$messageid";
	
	$deleteresult = $conn->query($deletequery);
	
	if(!$deleteresult){
		echo $conn->error;	
	} else{
		header("location: viewmessages.php");	
	}
?>