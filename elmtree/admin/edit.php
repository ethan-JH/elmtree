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
	
	$bookid = $conn->real_escape_string($_GET['bookid']);
  
	$readbook = "SELECT * FROM `elmtree_books` WHERE elmtree_books.bookid = $bookid";
			
	$bookresult = $conn->query($readbook);		
	
	if(!$bookresult){
		echo $conn->error;	
	}
			
	$readbookcategory = "SELECT * FROM elmtree_books INNER JOIN elmtree_bookcategory_reference
					ON elmtree_books.bookid = elmtree_bookcategory_reference.bookid
					WHERE elmtree_bookcategory_reference.bookid = $bookid";
					
	$bookcatresult = $conn->query($readbookcategory);		
	
	if(!$bookcatresult){
		echo $conn->error;	
	}
	
	$readcondition = "SELECT * FROM elmtree_condition";
  
	$condresult = $conn->query($readcondition);
	
	if(!$condresult){
		echo $conn->error;	
	}
	
	$readcategory = "SELECT * FROM elmtree_categories";
	
	$catresult = $conn->query($readcategory);
	
	if(!$catresult){
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
				<h2>Edit your book details below</h2>
			</div>
		</div>
	</div>
	<div class="container">
	<?php
		echo "<form action='editprocess.php?bookid=$bookid' method='POST' enctype='multipart/form-data'>";
	?>
		
		<?php
		
		while($bookrow = $bookresult->fetch_assoc()){

			$titledata=$bookrow["title"];
			$authordata=$bookrow["author"];
			$pricedata = $bookrow["price"];
			$blurbdata = $bookrow["blurb"];
			$imgpath = $bookrow["imgpath"];	
			$conditiondata = $bookrow["conditionid"];
			$visibility = $bookrow["publicvisible"];
		
			echo	"<div class='form-row'>
					<div class='form-group col-md-6'>
					  <label for='inputTitle'>Title</label>
					  <input type='text' class='form-control border border-success' id='inputTitle' placeholder='Title of the book' name='inserttitle' required='' value='$titledata'>
					</div>
					<div class='form-group col-md-6'>
					  <label for='inputAuthor'>Author</label>
					  <input type='text' class='form-control border border-success' id='inputAuthor' placeholder='Author of the book' name='insertauthor' required='' value='$authordata'>
					</div>
				  </div>
				  
				  <div class='form-row'>
					<div class='form-group col-md-6'>
					  <label for='inputPrice'>Price</label>
					  <div class='input-group-prepend'>
						<div class='input-group-text'>&pound</div>
						<input type='number' min='0.00' max='10000.00' step='0.01' class='form-control border border-success' id='inputInstagram' placeholder='Price is at your discretion' name='insertprice' required='' value='$pricedata'>
					  </div>
					</div>
				  </div>
				  <div class='form-group row border border-success'>
					<div class='col-sm-3'><h4>Condition of Book</h4></div>
					<div class='col-sm-9'>";
			
				while($condrow = $condresult->fetch_assoc()){
					
					$condid = $condrow['conditionid'];
					$condtype = $condrow['condition_type'];
					$conddescription = $condrow['description'];
					
					if($conditiondata == $condid){
						echo "<div class='form-check'>
							<input class='form-check-input' type='radio' id='condition$condid' name='conditionRadio' value='$condid' checked>
							<label class='form-check-label' for='condition$condid'>
							$condtype - $conddescription
							</label>
						</div>";
					} else {
						echo "<div class='form-check'>
							<input class='form-check-input' type='radio' id='condition$condid' name='conditionRadio' value='$condid'>
							<label class='form-check-label' for='condition$condid'>
							$condtype - $conddescription
							</label>
						</div>";
					}
					
					
				}	
			
			echo  "</div>
				  </div>
				  <div class='form-group row border border-success'>
					<div class='col-sm-3'>
						<h4>Book Categories</h4>
						<p class='text-muted'>Pick one or many</p>
					</div>
					<div class='col-sm-9'>";
				
				while($bookcatrow = $bookcatresult->fetch_assoc()){
						
						$bookcatid  = $bookcatrow['categoryid'];
						
					while($catrow = $catresult->fetch_assoc()){
						
						$catid = $catrow['categoryid'];
						$catname = $catrow['categoryname'];
						$catdescription = $catrow['categorydesc'];
						
							if($bookcatid == $catid){
								echo "<div class='form-check'>
									<input class='form-check-input' type='checkbox' id='categoryCheck' name='categoryCheck[]' value='$catid' checked>
									<label class='form-check-label' for='categoryCheck[]'>
									$catname - $catdescription
									</label>
								</div>";
							} else {
								echo "<div class='form-check'>
									<input class='form-check-input' type='checkbox' id='categoryCheck' name='categoryCheck[]' value='$catid'>
									<label class='form-check-label' for='categoryCheck[]'>
									$catname - $catdescription
									</label>
								</div>";
							}
						}	
				}	
			
			echo	"<p><a class='btn btn-warning' href='addcategory.php'> Add New Category</a></p>
					</div>
				  </div>
				  <div class='form-row'>
					<div class='form-group col'>
					  <label for='inputBlurb'><h5>Blurb</h5></label>
					  <textarea class='form-control border border-success' id='inputBlurb' placeholder='A short description of the book goes here' name='insertblurb' required=''>$blurbdata</textarea>
					</div>
				  </div>
				  <div class='form-row'>
					  <div class='custom-file'>
						  <input type='file' class='custom-file-input border border-success' id='customFile' name='uploadBookImg'>
						  <label class='custom-file-label border border-success' for='customFile'>$imgpath</label>
					  </div>
				  </div>
				  <br>
				   <div class='form-group row border border-success'>
					<div class='col-md-4'>
						<h4>Choose Visibility of Product</h4>
					</div>
					<div class='col-md-8'>
						<div class='form-check'>";
						
						if($visibility == 1){
						echo "<input class='form-check-input' type='radio' id='visibility' name='visibilityRadio' value='1' checked>
							<label class='form-check-label' for='visibility'>
								Make publicly visible 
							</label>";
						} else{
							echo "<input class='form-check-input' type='radio' id='visibility' name='visibilityRadio' value='1'>
							<label class='form-check-label' for='visibility'>
								Make publicly visible 
							</label>";
						}
				echo	"</div>
						<div class='form-check'>";
						
						if($visibility == 1){
						echo "<input class='form-check-input' type='radio' id='visibility' name='visibilityRadio' value='0'>
							<label class='form-check-label' for='visibility'>
								Make private 
							</label>";
						} else{
							echo "<input class='form-check-input' type='radio' id='visibility' name='visibilityRadio' value='0' checked>
							<label class='form-check-label' for='visibility'>
								Make private 
							</label>";
						}
				echo "</div>
					</div>
				  </div>
				  <div class='form-row toppadding'>
					<input type='submit' class='btn btn-success' value='Save Changes' name='editbook'>
				  </div>";
		}
		 ?>
		</form>
	</div>	
	
<?php
	include("../markup/endmarkup.php");
?>