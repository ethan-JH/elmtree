<?php
	
	session_start();
	
	if(!isset($_SESSION['40146582_id'])){
		header('Location: ../index.php');
	}	
	
	include("../conn.php");
  
	$read = "SELECT * FROM elmtree_users";	
  
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
						
						$userid = $row["userid"];
						$userdata = $row["username"];
						$firstname = $row["firstName"];
						$lastname = $row["lastName"];
						
						echo "<div class='row bg-light border border-success'>
								<div class='col'>
									<h2>$userdata</h2>
									<p class='lead'>$firstname $lastname</p>
									<a class='btn btn-success' href='adminprofile.php?userid=$userid'>View</a>";
							
							if($adminrole == 1){
								echo "<a class='btn btn-warning float-right' href='editprofile.php?userid=$userid'>Edit</a>
								<button type='button' class='btn btn-danger float-right' href='deleteprofile.php?userid=$userid' data-toggle='modal' data-target='#delete'>Delete</button>
									<div class='modal fade' id='delete' tabindex='-1' role='dialog' aria-labelledby='deleteLabel' aria-hidden='true'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<h5 class='modal-title' id='deleteLabel'>Delete Category</h5>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											  <span aria-hidden='true'>&times;</span>
											</button>
										  </div>
										  <div class='modal-body'>
											Are you sure you'd like to delete this category?
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-success' data-dismiss='modal'>Cancel</button>
											<a href='deleteprofile.php?userid=$userid' class='btn btn-danger'>Delete</a>
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