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
    <section class="jumbotron text-center">
      <div class="container">
		<?php
			echo "<h1 class='jumbotron-heading'>Here are your books, $myfirstname</h1>";
		?>
      </div>
    </section>
	
	<div class="album py-5 bg-light">
        <div class="container">
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
											
						if($myuserid == $sellerid){
							echo "<a class='btn btn-warning' href='edit.php?bookid=$bookid'>Edit</a>
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
									</div>";
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