<?php
	
	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}
	
	include("../conn.php");
	
	$bookid = $conn->real_escape_string($_GET['bookid']);
  
	$read = "SELECT * FROM `elmtree_books` 
			INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid
			INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid
			WHERE elmtree_books.bookid = $bookid";	
  
	$result = $conn->query($read);
	
	if(!$result){
		echo $conn->error;	
	}
	
	$readcategory = "SELECT * FROM elmtree_books INNER JOIN elmtree_bookcategory_reference
					ON elmtree_books.bookid = elmtree_bookcategory_reference.bookid
					INNER JOIN elmtree_categories
					ON elmtree_bookcategory_reference.categoryid = elmtree_categories.categoryid
					WHERE elmtree_bookcategory_reference.bookid = $bookid";	
	
	$categoryresult = $conn->query($readcategory);
	
	if(!$categoryresult){
		echo $conn->error;	
	}
	
	$myuserid = $_SESSION['40146582_id'];
	$myusername = $_SESSION['40146582_user'];
	$myfirstname = $_SESSION['40146582_firstname'];
	$adminrole = $_SESSION['40146582_admin'];
  
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
					while($row = $result->fetch_assoc()){
						
						$bookid = $row["bookid"];
						$titledata=$row["title"];
						$authordata=$row["author"];
						$pricedata = $row["price"];
						$imgpath = $row["imgpath"];	
						$blurbdata = $row["blurb"];
						$conditiondata = $row["condition_type"];
						$conddesc = $row["description"];
						$sellerid = $row["sellerid"];
						$sellername = $row["username"];	
						$bought = $row["purchased"];
						
						echo "<div class='col-md-5'>
								<img src='../bookimages/$imgpath' class='bookcard smallpadding'>	
							</div>
							<div class='col-md-6'>
								<h1 class='toppadding'>$titledata</h1>
								<h2 class='text-muted'>$authordata</h2>
								<p>$blurbdata</p>
								<p><strong>Categories: </strong>";				
						
						while($catrow = $categoryresult->fetch_assoc()){
							$categoryid = $catrow["categoryid"];
							$categorydata = $catrow["categoryname"];
							$catdescript = $catrow["categorydesc"];
							
							echo "<a href='category.php?catid=$categoryid' class='badge badge-secondary'>$categorydata </a>";
						}		
		
						echo	"</p>
								 <p>
									<h4 class='float-right'>Seller:";
									
						if($myuserid == $sellerid) {
							echo "<a href='myprofile.php' class='badge badge-success'>$sellername</a>
									</h4>
									<span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='$conddesc'>
										<button class='btn btn-warning' style='pointer-events: none;' type='button' disabled>$conditiondata</button>
									</span>	
								</p>
								<p>
								<h2>&pound$pricedata <a class='btn btn-warning btn-lg float-right' href='edit.php?bookid=$bookid'>Edit</a></h2>
								</p>
								<p>
									<button type='button' class='btn btn-danger btn-lg' href='deletebook.php?bookid=$bookid' data-toggle='modal' data-target='#deleteBook'>Delete</button>
									
									<div class='modal fade' id='deleteBook' tabindex='-1' role='dialog' aria-labelledby='deleteBookLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='deleteBookLabel'>Delete Book</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to delete this book?
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-success' data-dismiss='modal'>Cancel</button>
											<a href='deletebook.php?bookid=$bookid' class='btn btn-danger'>Delete</a>
										  </div>
										</div>
									  </div>
									</div>
								</p>
								</div>";
						} elseif($adminrole == 1){
							echo "<a href='adminprofile.php?userid=$sellerid' class='badge badge-success'>$sellername</a>
									</h4>
									<span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='$conddesc'>
										<button class='btn btn-warning' style='pointer-events: none;' type='button' disabled>$conditiondata</button>
									</span>	
								</p>
								<p>
								<h2>&pound$pricedata <a class='btn btn-warning btn-lg float-right' href='edit.php?bookid=$bookid'>Edit</a><h2>
								</p>
								<p>
									<button type='button' class='btn btn-danger btn-lg' href='deletebook.php?bookid=$bookid' data-toggle='modal' data-target='#deleteBook'>Delete</button>
									<button type='button' class='btn btn-success btn-lg float-right' href='buy.php?bookid=$bookid' data-toggle='modal' data-target='#buyBook'>Buy</button>
									
									<div class='modal fade' id='deleteBook' tabindex='-1' role='dialog' aria-labelledby='deleteBookLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='deleteBookLabel'>Delete Book</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to delete this book?
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-success' data-dismiss='modal'>Cancel</button>
											<a href='deletebook.php?bookid=$bookid' class='btn btn-danger'>Delete</a>
										  </div>
										</div>
									  </div>
									</div>
								</p>
								</div>
								
								<div class='modal fade' id='buyBook' tabindex='-1' role='dialog' aria-labelledby='buyBookLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='buyBookLabel'>Buy Book</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to buy this book?
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-warning' data-dismiss='modal'>Cancel</button>
											<a href='buy.php?bookid=$bookid' class='btn btn-success'>Buy</a>
										  </div>
										</div>
									  </div>
									</div>
								</p>
								</div>";
						} elseif($bought == 1){
							echo "<a href='profile.php?userid=$sellerid' class='badge badge-success'>$sellername</a>
									</h4>
									<span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='$conddesc'>
										<button class='btn btn-warning' style='pointer-events: none;' type='button' disabled>$conditiondata</button>
									</span>	
								</p>
								<p>
								<h2>&pound$pricedata<h2>
								</p>";
							
						}else {
							echo "<a href='profile.php?userid=$sellerid' class='badge badge-dark'>$sellername</a>
									</h4>
									<span class='d-inline-block' tabindex='0' data-toggle='tooltip' title='$conddesc'>
										<button class='btn btn-warning' style='pointer-events: none;' type='button' disabled>$conditiondata</button>
									</span>
									
								</p>
								<p>
								<h2>&pound$pricedata <button type='button' class='btn btn-success btn-lg float-right' href='buy.php?bookid=$bookid' data-toggle='modal' data-target='#buyBook'>Buy</button></h2>
								<div class='modal fade' id='buyBook' tabindex='-1' role='dialog' aria-labelledby='buyBookLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='buyBookLabel'>Buy Book</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to buy this book?
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-warning' data-dismiss='modal'>Cancel</button>
											<a href='buy.php?bookid=$bookid' class='btn btn-success'>Buy</a>
										  </div>
										</div>
									  </div>
									</div>
								<p>
								</div>";
						}
							
					}
				?>
				
							
				
			</div>
	</div>
<?php
	include("../markup/endmarkup.php");
?>