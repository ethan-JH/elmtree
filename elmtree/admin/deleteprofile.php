<?php

	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}
	
	include("../conn.php");
	
	$profileid = $conn->real_escape_string($_GET['userid']);
	
	$deletebookquery = "DELETE FROM elmtree_books WHERE sellerid=$profileid";
	
	$deletebookresult = $conn->query($deletebookquery);
	
	if(!$deletebookresult){
		echo $conn->error;	
	}
	
	$deleteuserquery = "DELETE FROM elmtree_users WHERE userid=$profileid";
	
	$deleteuserresult = $conn->query($deleteuserquery);
	
	if(!$deleteuserresult){
		echo $conn->error;	
	} elseif($adminrole == 0) {
		session_start();
		$_SESSION = array();
		session_destroy();
		header("location: ../index.php");	
	} else{
		header("location: index.php");
	}
	

?>