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
	
	$bookid = $conn->real_escape_string($_GET['bookid']);
	$title = $conn->real_escape_string($_POST["inserttitle"]);
	$author = $conn->real_escape_string($_POST["insertauthor"]);
	$price = $conn->real_escape_string($_POST["insertprice"]);
	$conditionid = $conn->real_escape_string($_POST["conditionRadio"]);
	$blurb = $conn->real_escape_string($_POST["insertblurb"]);
	$visibility = $conn->real_escape_string($_POST["visibilityRadio"]);
	$errorflag = 0;
	
	$filename = $_FILES['uploadBookImg']['name'];
	
	if(empty($filename)){
		$errorflag = 1;
	}
	if($errorflag==1){
		$insertquery = "UPDATE elmtree_books SET title='$title', author='$author', price='$price', blurb='$blurb', conditionid='$conditionid', publicvisible='$visibility' WHERE bookid='$bookid'";
	}else{
		$rand = rand(0, 1000000);
		$filename = $_FILES['uploadBookImg']['name'];
		$filename = $rand.$filename;
		$filetmp = $_FILES['uploadBookImg']['tmp_name'];
		$filetype = $_FILES['uploadBookImg']['type'];
		move_uploaded_file($filetmp, "../bookimages/".$filename);
		$insertquery = "UPDATE elmtree_books SET title='$title', author='$author', price='$price', blurb='$blurb', imgpath='$filename', conditionid='$conditionid', publicvisible='$visibility' WHERE bookid='$bookid'";
	}
	
	$result = $conn->query($insertquery);
	if(!$result){
		echo $conn->error;
	} 
	
	$deletequery = "DELETE FROM elmtree_bookcategory_reference WHERE bookid=$bookid";
	
	$deleteresult = $conn->query($deletequery);
	
	if(!$deleteresult){
		echo $conn->error;	
	} else {
		
		$category = $_POST['categoryCheck'];
			
		for($i=0; $i < count($category); $i++){
				
				$categoryloop = $category[$i];	
				$insertcategory = "INSERT into elmtree_bookcategory_reference (bookid, categoryid) VALUES ('$bookid', '$categoryloop')";	
				$resultcatinsert = $conn->query($insertcategory);
				
				if(!$resultcatinsert){
				 echo $conn->error;	
				} else {
					header('location: index.php');
				}	
		}

	}
?>