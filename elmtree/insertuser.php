<?php

	include('conn.php');
	
	$user = $conn->real_escape_string($_POST["insertusername"]);
	$pass = $conn->real_escape_string($_POST["insertpass"]);
	$firstName = $conn->real_escape_string($_POST["firstName"]);
	$lastName = $conn->real_escape_string($_POST["lastName"]);
	$emailName = $conn->real_escape_string($_POST["insertEmail"]);
	$phoneNum = $conn->real_escape_string($_POST["insertPhone"]);
	$university = $conn->real_escape_string($_POST["insertUniversity"]);
	$instagram = $conn->real_escape_string($_POST["insertInsta"]);
	$rand = rand(0, 1000000);
	
	$filename = $_FILES['uploadProfilePic']['name'];
	$filename = $rand.$filename;
	$filetmp = $_FILES['uploadProfilePic']['tmp_name'];

	$filetype = $_FILES['uploadProfilePic']['type'];
	
	move_uploaded_file($filetmp, "admin/profileimages/".$filename);
	
	$insert = "insert into elmtree_users (username, password, firstName, lastName, email, phoneNumber, profileImgPath, university, instagramTag) values('$user', '$pass', '$firstName', '$lastName', '$emailName', '$phoneNum', '$filename', '$university', '$instagram')";
	
	$result = $conn->query($insert);
	
	if(!$result){
		echo $conn->error;
	}	else {
		header('location: login.php');
	}	

?>