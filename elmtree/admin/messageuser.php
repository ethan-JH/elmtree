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
	
	$readuser = "SELECT * FROM elmtree_users WHERE elmtree_users.userid=$profileid";		
  
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
				
	<?php
	
		while($row = $userresult->fetch_assoc()){
			
			$sellerid = $row['userid'];
			$userdata = $row['username'];
			
			echo	"<h2>Send a message to $userdata</h2>
					</div>
				</div>
			</div>
			<div class='container'>
				<form action='messageprocess.php' method='POST'>
				  <input type='text' name='receiverid' value='$sellerid' hidden>
				  <div class='form-row'>
					<div class='form-group col'>
					  <label for='inputMessage'><h5>Message</h5></label>
					  <textarea class='form-control border border-success' id='inputMessage' placeholder='A short description of the category goes here' name='insertmessage' required=''></textarea>
					</div>
				  </div>
				  
				  <div class='form-row toppadding'>
					<input type='submit' class='btn btn-success' value='Send Message' name='sendmessage'>";
		}
	?>
		  </div>
		</form>
	</div>	
	
<?php
	include("../markup/endmarkup.php");
?>