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
	
	$message = $conn->real_escape_string($_POST["insertmessage"]);
	$receiverid = $conn->real_escape_string($_POST["receiverid"]);
	
	$insert = "insert into elmtree_messages (senderid, message, receiverid) values('$myuserid', '$message', '$receiverid')";
	
	$result = $conn->query($insert);
	
	if(!$result){
		echo $conn->error;
	}	else {
		header("location: index.php");
	}	

?>