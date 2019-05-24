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
	
	$profileid = $conn->real_escape_string($_GET['userid']);
	
	$readuser = "SELECT * FROM `elmtree_users` WHERE userid = $profileid";
			
	$userresult = $conn->query($readuser);		
	
	if(!$userresult){
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
				<h4 class="text-muted">Edit your details below</h4>
				<p>* means required field</p>
			</div>
		</div>
	</div>
	<div class="container">
		<form action="editprofileprocess.php" method="POST" enctype="multipart/form-data">
		
		<?php
			
			while($userrow = $userresult->fetch_assoc()){
				
				$userid = $userrow['userid'];
				$userdata = $userrow['username'];
				$passdata = $userrow['password'];
				$firstnamedata = $userrow['firstName'];
				$lastnamedata = $userrow['lastName'];
				$emaildata = $userrow['email'];
				$phonedata = $userrow['phoneNumber'];
				$profileimgpath = $userrow['profileImgPath'];
				$unidata = $userrow['university'];
				$instadata = $userrow['instagramTag'];

				echo "<input type='text' value='$profileid' name='insertprofileid' hidden>
					<div class='form-row'>
					<div class='form-group col-md-6'>
					  <label for='inputUsername'>Username*</label>
					  <input type='text' class='form-control border border-success' id='inputUsername' placeholder='Username' name='insertusername' required='' value='$userdata'>
					</div>
					<div class='form-group col-md-6'>
					  <label for='inputPassword4'>Password*</label>
					  <input type='password' class='form-control border border-success' id='inputPassword4' placeholder='Password' name='insertpass' required='' value='$passdata'>
					</div>
				  </div>
				  
				  <div class='form-row'>
					<div class='form-group col-md-6'>
					  <label for='inputFirstName'>First Name*</label>
					  <input type='text' class='form-control border border-success' id='inputFirstName' placeholder='First Name' name='firstName' required='' value='$firstnamedata'>
					</div>
					<div class='form-group col-md-6'>
					  <label for='inputLastName'>Last Name*</label>
					  <input type='text' class='form-control border border-success' id='inputLastName' placeholder='Last Name' name='lastName' required='' value='$lastnamedata'>
					</div>
				  </div>
				  
				  <div class='form-row'>
					<div class='form-group col-md-6'>
					  <label for='inputEmail'>Email*</label>
					  <input type='email' class='form-control border border-success' id='inputEmail' placeholder='Your email address' name='insertEmail' required='' value='$emaildata'>
					</div>
					<div class='form-group col-md-6'>
					  <label for='inputPhoneNumber'>Phone Number</label>
					  <input type='text' class='form-control border border-warning' id='inputPhoneNumber' placeholder='Your phone number' name='insertPhone' value='$phonedata'>
					</div>
				  </div>
				  <div class='form-row'>
						<p>Profile Picture*</p>
					  <div class='custom-file'>
						  <input type='file' class='custom-file-input border border-success' id='customFile' name='uploadProfilePic'>
						  <label class='custom-file-label border border-success' for='customFile'>$profileimgpath</label>
					  </div>
				  </div>
				  <div class='form-row toppadding'>
					<div class='form-group col-md-6'>
					  <label for='inputUniversity'>University*</label>
					  <input type='text' class='form-control border border-success' id='inputUniversity' placeholder='Your university or college' name='insertUniversity' required='' value='$unidata'>
					</div>
					<div class='form-group col-md-6'>
					  <label for='inputInstagram'>Instagram Tag</label>
					  <div class='input-group-prepend'>
						<div class='input-group-text'>@</div>
						<input type='text' class='form-control border border-warning' id='inputInstagram' placeholder='Just the name, no @ needed' name='insertInsta' value='$instadata'>
					  </div>
					</div>
				  </div>
				  
				  <div class='form-row'>
					<input type='submit' class='btn btn-success' value='Save Changes' name='register'>
				  </div>";
			}
		?>
		</form>
	</div>	
	
<?php
	include("../markup/endmarkup.php");
?>