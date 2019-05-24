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
	
	$userpost = $conn->real_escape_string($_POST["insertusername"]);
	$passpost = $conn->real_escape_string($_POST["insertpass"]);
	$firstname = $conn->real_escape_string($_POST["firstName"]);
	$lastname = $conn->real_escape_string($_POST["lastName"]);
	$email = $conn->real_escape_string($_POST["insertEmail"]);
	$phone = $conn->real_escape_string($_POST["insertPhone"]);
	$university = $conn->real_escape_string($_POST["insertUniversity"]);
	$instagram = $conn->real_escape_string($_POST["insertInsta"]);
	$errorflag = 0;
	
	$filename = $_FILES['uploadProfilePic']['name'];
	
	if(empty($filename)){
		$errorflag = 1;
	}
	if($errorflag==1){
		$insertquery = "UPDATE elmtree_users SET username='$userpost', password='$passpost', firstName='$firstname', lastName='$lastname', email='$email', phoneNumber='$phone', university='$university', instagramTag='$instagram' WHERE userid='$myuserid'";
	}else{
		$rand = rand(0, 1000000);
		$filename = $_FILES['uploadProfilePic']['name'];
		$filename = $rand.$filename;
		$filetmp = $_FILES['uploadProfilePic']['tmp_name'];
		$filetype = $_FILES['uploadProfilePic']['type'];
		move_uploaded_file($filetmp, "profileimages/".$filename);
		$insertquery = "UPDATE elmtree_users SET username='$userpost', password='$passpost', firstName='$firstname', lastName='$lastname', email='$email', phoneNumber='$phone', profileImgPath='$filename', university='$university', instagramTag='$instagram' WHERE userid='$myuserid'";
	}
	
	$result = $conn->query($insertquery);
	if(!$result){
		echo $conn->error;
	} else{
		header("location: myprofile.php");	
	}
	
?>