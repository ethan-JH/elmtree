<?php
	
	session_start();
	
	include("conn.php");
	
	$user = $conn->real_escape_string($_POST["postuser"]);
	$pass = $conn->real_escape_string($_POST["postpass"]);
	
	$checkuser = "select * from elmtree_users where username = '$user' and password='$pass'";
	
	$result = $conn->query($checkuser);
	
	if(!$result){
		echo $conn->error;	
	}
	
	$num = $result -> num_rows;
	
	if($num > 0){
		
		while($row = $result->fetch_assoc()){
			
			$myuser = $row['username'];
			$myid = $row['userid'];
			$myfirstname = $row['firstName'];
			$adminrole = $row['administrator'];
			
			$_SESSION['40146582_user'] = $myuser;
			$_SESSION['40146582_id'] = $myid;
			$_SESSION['40146582_firstname'] = $myfirstname;
			$_SESSION['40146582_admin'] = $adminrole;
				
		}	
		
		header('location: admin/index.php');		
	} else {
		header('location: login.php');	
	}	


?>