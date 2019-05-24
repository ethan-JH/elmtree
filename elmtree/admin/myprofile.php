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
			
	$readuser = "SELECT * FROM elmtree_users WHERE elmtree_users.userid=$myuserid";		
  
	$userresult = $conn->query($readuser);
	
	if(!$userresult){
		echo $conn->error;	
	}
	
	$readuserbooks = "SELECT * FROM `elmtree_books` 
			INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid
			INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid
			WHERE elmtree_books.sellerid = $myuserid";
	
	$userbooksresult = $conn->query($readuserbooks);
	
	if(!$userbooksresult){
		echo $conn->error;	
	}
	
	$readrating = "SELECT starrating FROM elmtree_ratings WHERE elmtree_ratings.sellerid = '$myuserid'";
	$ratingresult = $conn->query($readrating);
	if(!$ratingresult){
		echo $conn->error;	
	}
	
	$num_rating_rows =mysqli_num_rows($ratingresult);
	
	$readavgrating = "SELECT CAST(AVG(starrating) AS DECIMAL(10,1)) AS 'averagerating' FROM elmtree_ratings WHERE elmtree_ratings.sellerid = '$myuserid'";
	$avgratingresult = $conn->query($readavgrating);
	if(!$avgratingresult){
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
	
	<div class="container bg-white toppadding">
          
			<div class="row bg-light border border-success">	
				<?php
					while($userrow = $userresult->fetch_assoc()){
						
						$userid = $userrow['userid'];
						$userdata = $userrow['username'];
						$firstnamedata = $userrow['firstName'];
						$lastnamedata = $userrow['lastName'];
						$emaildata = $userrow['email'];
						$phonedata = $userrow['phoneNumber'];
						$profileimgpath = $userrow['profileImgPath'];
						$unidata = $userrow['university'];
						$instadata = $userrow['instagramTag'];
						
						echo "<div class='col-md-5'>
								<img src='profileimages/$profileimgpath' class='bookcard smallpadding'>	
							</div>
							<div class='col-md-6'>
								<h1 class='toppadding'>$userdata</h1>
								<h2 class='text-muted toppadding'>$firstnamedata $lastnamedata</h2>
								<h4 class='toppadding'>Email: $emaildata</h4>";
						if(strlen($phonedata) > 0){
							echo "<h4 class='toppadding'>Phone Number: $phonedata</h4>";
						}
							echo "<h4 class='toppadding'>University: $unidata</h4>";
						if(strlen($instadata) > 0){		
							echo "<h4 class='toppadding'>Instagram: <a class='badge badge-danger text-dark' href='https://www.instagram.com/$instadata/' target='_blank'>@$instadata</a></h3>";
						}
						
						if($num_rating_rows > 0){
							while($avgrow = $avgratingresult->fetch_assoc()){
								$averagerating = $avgrow['averagerating'];
								echo "<h4 class='toppadding'>Seller Rating: <strong>$averagerating</strong>/5 Stars</h4>";
							}
						}
						echo	"<p><a class='btn btn-lg btn-warning btn-block' href='editmyprofile.php'><strong>EDIT PROFILE</strong></a><p>
								<p><button type='button' class='btn btn-danger btn-block' href='deleteprofile.php?userid=$userid' data-toggle='modal' data-target='#delete'><strong>DELETE PROFILE</strong></button></p>
									<div class='modal fade' id='deleteBook' tabindex='-1' role='dialog' aria-labelledby='deleteLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='deleteLabel'>Delete Profile</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to delete this profile? All books and details will be lost.
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-success' data-dismiss='modal'>Cancel</button>
											<a href='deleteprofile.php?userid=$userid' class='btn btn-danger'>Delete</a>
										  </div>
										</div>
									  </div>
									</div>
							</div>";
					}
				?>
				
							
				
			</div>
	</div>
	
	<div class="album py-5 bg-light">
        <div class="container">
		<div class="row">
			<div class="col">
				<h2>Your books for sale</h2>
			</div>
		</div class="row">
			<div class='row'>
          
				
				<?php
					while($bookrow = $userbooksresult->fetch_assoc()){
						
						$bookid = $bookrow["bookid"];
						$titledata=$bookrow["title"];
						$authordata=$bookrow["author"];
						$pricedata = $bookrow["price"];
						$imgpath = $bookrow["imgpath"];	
						$conditiondata = $bookrow["condition_type"];
						$sellerid = $bookrow["sellerid"];
						$sellername = $bookrow["username"];	
						$visible = $bookrow["publicvisible"];
						$bought = $bookrow["purchased"];
						
							echo "<div class='col-md-4'>
									<div class='card mb-4 box-shadow border border-success'>
											<img class='card-img-top' alt='Thumbnail' style='height:400px; width: 100%; display: block;' src='../bookimages/$imgpath' data-holder-rendered='true'>
											<div class='card-body'>
												<p class='card-text'>$titledata</p>
												<p class='card-text'>$authordata</p>
												<p class='card-text'>&pound$pricedata</p>
												<p class='card-text'>$conditiondata</p>
												<div class='d-flex justify-content-between align-items-center'>
												
												  <a class='btn btn-lg btn-outline-success' href='book.php?bookid=$bookid'>View</a>";
							
							if($visible == 1){
								echo "<small class='text'>PUBLIC</small>";	
							} else {
								echo "<small class='text'>PRIVATE</small>";
							}
							
							if($bought == 1){
								echo "<small>SOLD</small>";	
							}
								
							if($myuserid == $sellerid){
								echo "<a class='btn btn-warning' href='edit.php?bookid=$bookid'>Edit</a>";
							} else{
								echo "<small class='text-muted'>$sellername</small>";
							}
							
							echo	"</div>
											</div>
									</div>
								</div>";
						
					}
				?>
		
			</div>
		</div>

	</div>
	
<?php
	include("../markup/endmarkup.php");
?>