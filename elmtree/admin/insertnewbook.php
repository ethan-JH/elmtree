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
	
	$title = $conn->real_escape_string($_POST["inserttitle"]);
	$author = $conn->real_escape_string($_POST["insertauthor"]);
	$price = $conn->real_escape_string($_POST["insertprice"]);
	$conditionid = $conn->real_escape_string($_POST["conditionRadio"]);
	$blurb = $conn->real_escape_string($_POST["insertblurb"]);
	$visibility = $conn->real_escape_string($_POST["visibilityRadio"]);
	$rand = rand(0, 1000000);
	
	$filename = $_FILES['uploadBookImg']['name'];
	$filename = $rand.$filename;
	$filetmp = $_FILES['uploadBookImg']['tmp_name'];

	$filetype = $_FILES['uploadBookImg']['type'];
	
	move_uploaded_file($filetmp, "../bookimages/".$filename);
	
	$insert = "insert into elmtree_books (title, author, price, blurb, imgpath, conditionid, sellerid, publicvisible) values('$title', '$author', '$price', '$blurb', '$filename', '$conditionid', '$myuserid', '$visibility')";
	
	$result = $conn->query($insert);
	
	if(!$result){
		echo $conn->error;
	}	else {
		
		$newbookquery = "SELECT * FROM elmtree_books WHERE elmtree_books.imgpath = '$filename'";
		
		$newbookresult = $conn->query($newbookquery);
		
		if(!$newbookresult){
			echo $conn->error;	
		}
		
		while($newrow = $newbookresult->fetch_assoc()){
			
			$newbookid = $newrow['bookid'];
			
			$category = $_POST['categoryCheck'];
				
			for($i=0; $i < count($category); $i++){
				
				$categoryloop = $category[$i];	
				$insertcategory = "INSERT into elmtree_bookcategory_reference (bookid, categoryid) VALUES ('$newbookid', '$categoryloop')";	
				$resultcatinsert = $conn->query($insertcategory);
				
				if(!$resultcatinsert){
				 echo $conn->error;	
				} else {
					header('location: index.php');
				}	
			}

					
			
		}	
		
		
	}	

?>