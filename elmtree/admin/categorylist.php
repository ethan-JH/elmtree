<?php
	
	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}	
	
	include("../conn.php");
  
	$read = "SELECT * FROM elmtree_categories";	
  
	$result = $conn->query($read);
	
	if(!$result){
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
          
				
				<?php
					while($row = $result->fetch_assoc()){
						
						$categoryid = $row["categoryid"];
						$catnamedata = $row["categoryname"];
						$catdescdata = $row["categorydesc"];
						
						echo "<div class='row bg-light border border-success'>
								<div class='col'>
									<h2>$catnamedata</h2>
									<p class='lead'>$catdescdata</p>
									<a class='btn btn-success' href='category.php?catid=$categoryid'>Browse</a>";
							
							if($adminrole == 1){
								echo "<a class='btn btn-warning float-right' href='editcategory.php?catid=$categoryid'>Edit</a>
								<button type='button' class='btn btn-danger float-right' href='deletecategory.php?catid=$categoryid' data-toggle='modal' data-target='#deleteBook'>Delete</button>
									<div class='modal fade' id='deleteBook' tabindex='-1' role='dialog' aria-labelledby='deleteBookLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='deleteBookLabel'>Delete Category</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to delete this category?
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-success' data-dismiss='modal'>Cancel</button>
											<a href='deletecategory.php?catid=$categoryid' class='btn btn-danger'>Delete</a>
										  </div>
										</div>
									  </div>
									</div>";
							}
							
						echo	"<p> </p>
								</div>
							 </div>";
						
					}
				?>
				
	</div>
<?php
	include("../markup/endmarkup.php");
?>