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
  
	$read = "SELECT * FROM elmtree_books INNER JOIN elmtree_bought_books 
			 ON elmtree_books.bookid = elmtree_bought_books.bookid
			 INNER JOIN elmtree_users 
			 ON elmtree_bought_books.buyerid = elmtree_users.userid
			 INNER JOIN elmtree_condition
			 ON elmtree_books.conditionid = elmtree_condition.conditionid
			 WHERE elmtree_bought_books.buyerid = $myuserid";
  
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
			<h2>Books you've bought in the past</h2>
		</div>
	</section>


    <div class="album py-5 bg-light">
        <div class="container">
			<div class='row'>
          
				
				<?php
					while($row = $result->fetch_assoc()){
						
						$bookid = $row["bookid"];
						$titledata=$row["title"];
						$authordata=$row["author"];
						$pricedata = $row["price"];
						$imgpath = $row["imgpath"];	
						$conditiondata = $row["condition_type"];
						$sellerid = $row["sellerid"];
						$sellername = $row["username"];	
						$visible = $row["publicvisible"];
						$bought = $row["purchased"];						
						
						if($bought == 1){
							echo "<div class='col-md-4'>
									<div class='card mb-4 box-shadow border border-success'>
											<img class='card-img-top' alt='Thumbnail' style='height:400px; width: 100%; display: block;' src='../bookimages/$imgpath' data-holder-rendered='true'>
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
		include("../markup/endmarkup.php");
	?>