<?php

	include("conn.php");
  
?>

<?php
	include("markup/headmarkup.php");
?>

<body>
	
    <!-- Nav bar details -->
	<?php	
		include("markup/topnav.php");	
	?>
	<div class="jumbotron text-center">
		<div class="row">
			<div class="col">
				<img src="images/elmtree_logo.jpg" width="100" height="100">
				<h2>Join the Elm Tree community</h2>
				<h4 class="text-muted">Enter your details below</h4>
				<p>* means required field</p>
			</div>
		</div>
	</div>
	<div class="container">
		<form action="insertuser.php" method="POST" enctype="multipart/form-data">
			<div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputUsername">Username*</label>
			  <input type="text" class="form-control border border-success" id="inputUsername" placeholder="Username" name="insertusername" required="">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputPassword4">Password*</label>
			  <input type="password" class="form-control border border-success" id="inputPassword4" placeholder="Password" name="insertpass" required="">
			</div>
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputFirstName">First Name*</label>
			  <input type="text" class="form-control border border-success" id="inputFirstName" placeholder="First Name" name="firstName" required="">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputLastName">Last Name*</label>
			  <input type="text" class="form-control border border-success" id="inputLastName" placeholder="Last Name" name="lastName" required="">
			</div>
		  </div>
		  
		  <div class="form-row">
			<div class="form-group col-md-6">
			  <label for="inputEmail">Email*</label>
			  <input type="email" class="form-control border border-success" id="inputEmail" placeholder="Your email address" name="insertEmail" required="">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputPhoneNumber">Phone Number</label>
			  <input type="text" class="form-control border border-warning" id="inputPhoneNumber" placeholder="Your phone number" name="insertPhone">
			</div>
		  </div>
		  <div class="form-row">
				<p>Profile Picture*</p>
			  <div class="custom-file">
				  <input type="file" class="custom-file-input border border-success" id="customFile" name="uploadProfilePic" required="">
				  <label class="custom-file-label border border-success" for="customFile">Your picture</label>
			  </div>
		  </div>
		  <div class="form-row toppadding">
			<div class="form-group col-md-6">
			  <label for="inputUniversity">University*</label>
			  <input type="text" class="form-control border border-success" id="inputUniversity" placeholder="Your university or college" name="insertUniversity" required="">
			</div>
			<div class="form-group col-md-6">
			  <label for="inputInstagram">Instagram Tag</label>
			  <div class="input-group-prepend">
				<div class="input-group-text">@</div>
				<input type="text" class="form-control border border-warning" id="inputInstagram" placeholder="Just the name, no @ needed" name="insertInsta">
			  </div>
			</div>
		  </div>
		  
		  <div class="form-row">
			<input type="submit" class="btn btn-success" value="Register" name="register">
		  </div>
		</form>
	</div>	
	
<?php
	include("markup/endmarkup.php");
?>