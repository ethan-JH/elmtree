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
	
	$boughtbookid = $conn->real_escape_string($_GET['bookid']);
	
	$setquery = "UPDATE elmtree_books SET purchased='1' WHERE bookid='$boughtbookid'";
	
	$setresult = $conn->query($setquery);
	
	if(!$setresult){
		echo $conn->error;
	}

?>

	<?php
		include("../markup/adminheadmarkup.php");
	?>
	
	<body>

    <!-- Nav bar details -->
	<?php
		include("../markup/admintopnav.php");
	?>
	
	<!-- jumbotron on welcome page -->
    <section class="jumbotron">
      <div class="container">
        <?php
			$selectquery = "SELECT * FROM elmtree_books INNER JOIN elmtree_users
					ON elmtree_books.sellerid = elmtree_users.userid
					WHERE bookid='$boughtbookid'";
	
			$selectresult = $conn->query($selectquery);
	
			if(!$selectresult){
				echo $conn->error;
			} else {
				while($selectrow = $selectresult->fetch_assoc()){
					
					$sellerid = $selectrow['sellerid'];
					$sellername = $selectrow['username'];
					$titledata = $selectrow['title'];
					
					$insertquery = "INSERT INTO elmtree_bought_books (bookid, buyerid, sellerid) VALUES ('$boughtbookid', '$myuserid', '$sellerid')";
					
					$insertresult = $conn->query($insertquery);
			
					if(!$insertresult){
						echo $conn->error;	
					}
				}
			}
				
			echo "<form action='insertrating.php' method='POST'>
				<h1>Thank you for buying $titledata from $sellername</h1>
				<h2 class='text-muted'>How would you rate $sellername as a seller out of 5 stars?</h2>
				<input type='text' class='form-control' placeholder='First name' value='$sellerid' name='sellerid' hidden>";
		?>
		
		
		
		<h4>My Rating:
		<br>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" id="inlineRadio1" value="1" name="starrating">
		  <label class="form-check-label" for="inlineRadio1">1 stars</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" id="inlineRadio2" value="2" name="starrating">
		  <label class="form-check-label" for="inlineRadio2">2 stars</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" id="inlineRadio3" value="3" name="starrating">
		  <label class="form-check-label" for="inlineRadio3">3 stars</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" id="inlineRadio4" value="4" name="starrating">
		  <label class="form-check-label" for="inlineRadio4">4 stars</label>
		</div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" id="inlineRadio5" value="5" name="starrating" checked>
		  <label class="form-check-label" for="inlineRadio5">5 stars</label>
		</div>
		</h4>
		<div class="form-row toppadding">
			<input type="submit" class="btn btn-success" value="Submit Rating" name="submitrating">
		  </div>
		</form>
      </div>
    </section>
	

    <?php
		include("../markup/endmarkup.php");
	?>