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
	
	$bookid = $conn->real_escape_string($_GET['bookid']);
	
	$deletequery = "DELETE FROM elmtree_books WHERE bookid=$bookid";
	
	$deletebookresult = $conn->query($deletequery);
	
	if(!$deletebookresult){
		echo $conn->error;	
	}
	
	$deletecatquery = "DELETE FROM elmtree_bookcategory_reference WHERE bookid=$bookid";
	
	$deletecatresult = $conn->query($deletecatquery);
	
	if(!$deletecatresult){
		echo $conn->error;	
	} else {
		header("location: index.php");	
	}
?>