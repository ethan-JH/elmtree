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
	
	$sellerid = $conn->real_escape_string($_POST["sellerid"]);
	$ratingvalue = $conn->real_escape_string($_POST["starrating"]);
	
	$insert = "INSERT INTO elmtree_ratings (sellerid, starrating, buyerid) values('$sellerid', '$ratingvalue', '$myuserid')";
	
	$result = $conn->query($insert);
	
	if(!$result){
		echo $conn->error;
	}	else {
		header("location: index.php");
	}	

?>