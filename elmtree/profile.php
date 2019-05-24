<?php

	include("conn.php");
	
	$profileid = $conn->real_escape_string($_GET['userid']);
			
	$readuser = "SELECT * FROM elmtree_users WHERE elmtree_users.userid=$profileid";		
  
	$userresult = $conn->query($readuser);
	
	if(!$userresult){
		echo $conn->error;	
	}
	
	$readuserbooks = "SELECT * FROM `elmtree_books` 
			INNER JOIN elmtree_condition ON elmtree_books.conditionid = elmtree_condition.conditionid
			INNER JOIN elmtree_users ON elmtree_books.sellerid = elmtree_users.userid
			WHERE elmtree_books.sellerid = $profileid";
	
	$userbooksresult = $conn->query($readuserbooks);
	
	if(!$userbooksresult){
		echo $conn->error;	
	}
  
?>

<?php
	include("markup/headmarkup.php");
?>

<body>

    <!-- Nav bar details -->
	<?php	
		include("markup/topnav.php");	
	?>
	
	<div class="container bg-white toppadding">
          
			<div class="row bg-light border border-success">	
				<?php
					while($userrow = $userresult->fetch_assoc()){
						
						$userid = $userrow['userid'];
						$userdata = $userrow['username'];
						$firstnamedata = $userrow['firstName'];
						$lastnamedata = $userrow['lastName'];
						$emaildata = $userrow['email'];
						$phonedata = $userrow['phoneNumber'];
						$profileimgpath = $userrow['profileImgPath'];
						$unidata = $userrow['university'];
						$instadata = $userrow['instagramTag'];
						
						echo "<div class='col-md-5'>
								<img src='admin/profileimages/$profileimgpath' class='bookcard smallpadding'>	
							</div>
							<div class='col-md-6'>
								<h1 class='toppadding'>$userdata</h1>
								<h2 class='text-muted toppadding'>$firstnamedata $lastnamedata</h2>
								<h4 class='toppadding'>Email: $emaildata</h4>
								<h4 class='toppadding'>Phone Number: $phonedata</h4>
								<h4 class='toppadding'>University: $unidata</h4>
								<h4 class='toppadding'>Instagram: <a class='badge badge-warning' href='https://www.instagram.com/$instadata/' target='_blank'>@$instadata</a></h3>
							</div>";
					}
				?>
				
							
				
			</div>
	</div>
	
	<div class="album py-5 bg-light">
        <div class="container">
		<div class="row">
			<div class="col">
				<h2>Their books for sale</h2>
			</div>
		</div class="row">
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
						$bought = $bookrow["purchased"];
						
						if($visible == 1 && $bought == 0){
							echo "<div class='col-md-4'>
									<div class='card mb-4 box-shadow border border-success'>
											<img class='card-img-top' alt='Thumbnail' style='height:400px; width: 100%; display: block;' src='bookimages/$imgpath' data-holder-rendered='true'>
											<div class='card-body'>
												<p class='card-text'>$titledata</p>
												<p class='card-text'>$authordata</p>
												<p class='card-text'>&pound$pricedata</p>
												<p class='card-text'>$conditiondata</p>
												<div class='d-flex justify-content-between align-items-center'>
												
												  <a class='btn btn-lg btn-outline-success' href='book.php?bookid=$bookid'>View</a>
												</div>
											</div>
									</div>
								</div>";
						}
					}
				?>
		
			</div>
		</div>

	</div>
	
<?php
	include("markup/endmarkup.php");
?>