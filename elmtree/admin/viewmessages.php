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
  
	$read = "SELECT * FROM elmtree_messages INNER JOIN elmtree_users 
			 ON elmtree_messages.senderid = elmtree_users.userid
			 WHERE elmtree_messages.receiverid = $myuserid";
  
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
	
			
	<section class='jumbotron text-center'>
		<div class='container'>
			<img src="../images/elmtree_logo.jpg" width="100" height="100">
			<?php
				echo "<h2>Here's your messages, $myfirstname.</h2>";
			?>
		</div>
	</section>

        <div class="container">

				<?php
					while($row = $result->fetch_assoc()){
						$messageid = $row["messageid"];
						$message = $row["message"];
						$userdata=$row["username"];
						$senderid=$row["userid"];
						$messagetime = $row["messagetime"];	
						$messagetime = date('H:m d/m/Y', strtotime($messagetime));
						
						echo "<div class='row'>
								<div class='col toppadding border border-success'>
								<h2>From: $userdata</h2>
								<p>$message</p>
								<p class='text-muted'>Sent at $messagetime</p>
								<p>
									<a class='btn btn-success' href='messageuser.php?userid=$senderid'>Reply</a>
									<a class='btn btn-danger' href='deletemessage.php?messageid=$messageid'>Delete</a>
								</div>
							 </div>";
					}
				?>
		</div>	

    <?php
		include("../markup/endmarkup.php");
	?>