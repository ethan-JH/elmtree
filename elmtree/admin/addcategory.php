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
	
	$read = "SELECT * FROM elmtree_categories";
  
	$result = $conn->query($read);
	
	if(!$result){
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
	<div class="jumbotron text-center">
		<div class="row">
			<div class="col">
				<img src="../images/elmtree_logo.jpg" width="100" height="100">
				<h2>Your book doesn't fit our categories?</h2>
				<h4 class="text-muted">Add your own below</h4>
			</div>
		</div>
	</div>
	<div class="container">
		<form action="insertcategory.php" method="POST" enctype="multipart/form-data">
			<div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputCatName">Category Name</label>
			  <input type="text" class="form-control border border-success" id="inputCatName" placeholder="The name of the category" name="insertcatname" required="">
			</div>
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col">
			  <label for="inputBlurb"><h5>Category Description</h5></label>
			  <textarea class="form-control border border-success" id="inputBlurb" placeholder="A short description of the category goes here" name="insertcatdesc" required=""></textarea>
			</div>
		  </div>
		  
		  <div class="form-row toppadding">
			<input type="submit" class="btn btn-success" value="Add Category" name="addbook">
		  </div>
		</form>
	</div>	
	
<?php
	include("../markup/endmarkup.php");
?>